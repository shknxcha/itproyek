<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilController extends BaseController
{
    // protected $profilModel berguna untuk menampung instansiasi dari ProfilModel
    protected $profilModel;

    public function __construct()
    {
        // berfungsi untuk membuat instansiasi dari ProfilModel dan disimpan ke dalam $this->profilModel
        $this->profilModel = new ProfilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->profilModel->findAll()
        ];

        return view('profil/tabelProfil', $data);
    }
    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => 'required|is_image',
            'ikon' => 'required|alpha_numeric',
            'uraian' => 'required|string|max_length[255]',
            'keterangan' => 'required|string|max_length[255]',
            'judul' => 'required|string|max_length[255]',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update data di database
        $data = $this->request->getPost(['gambar', 'ikon', 'uraian', 'keterangan', 'judul']);
        $this->profilModel->update($id, $data);

        return redirect()->to('/profil')->with('success', 'Profil berhasil diupdate.');
    }

}
