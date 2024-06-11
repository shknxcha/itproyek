<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    protected $model;

    public function __construct()
    {
        // berfungsi untuk memanggil class ProdukModel
        $this->model = new ProfilModel();
    }
    public function index()
    {
        // Data untuk dikirim ke view 
        $data = [
            'title' => 'Data Profil',
            'profile' => $this->model->findAll(),
        ];
       
        return view('profil/tabelProfil', $data);
    }

    public function updateProfil($id)
    {
        $model = new ProfilModel();
        $data['profile'] = $model->findAll();
        // Validasi input data dari form untuk setiap atribut
        $validation = \Config\Services::validation();
        // Set rules untuk validasi input data dari form untuk setiap atribut
        $validation->setRules([
            'gambar' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'ikon' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'uraian' => 'required',
            'keterangan' => 'required',
            'judul' => 'required|integer',
            
        ]);

        // Jika validasi gagal, kembali ke halaman editproduk dengan membawa pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/edit/' . $id)->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar" jika ada
        $gambar = $this->request->getFile('gambar');
        // Ambil nama file gambar lama dari form input dengan name="gambar_lama"
        $gambar_lama = $this->request->getPost('gambar_lama');
        // Dapatkan data produk berdasarkan id
        $profile = $this->model->find($id);

        // Jika file gambar baru diunggah, valid dan belum dipindah maka pindahkan file gambar
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Simpan nama file gambar baru
            $namagambar = $gambar->getRandomName();
            // Pindahkan file gambar ke direktori yang diinginkan
            $gambar->move(FCPATH . 'gambar_profil', $namagambar);
            // Hapus gambar lama jika bukan default.jpg
            if ($gambar_lama != 'default.jpg') {
                if (file_exists(FCPATH . 'gambar_profil/' . $gambar_lama)) {
                    unlink(FCPATH . 'gambar_profil/' . $gambar_lama);
                }
            }
            // Jika file gambar baru diunggah, gunakan gambar baru 
        } else {
            // Jika tidak ada gambar baru diunggah, gunakan gambar lama
            $namagambar = $gambar_lama;
        }

        // Data untuk disimpan ke database berdasarkan input form editproduk 
        $data = [
            'id_profile' => $id,
            'gambar' => $namagambar, // Nama gambar baru atau lama,
            'ikon' => $this->request->getPost('ikon'),
            'uraian' => $this->request->getPost('uraian'),
            'keterangan' => $this->request->getPost('keterangan'),
            'judul' => $this->request->getPost('judul')
        ];

        // var_dump($data);
        // die;

        // Simpan data ke database melalui model produkModel yang dipanggil dari constructor Produk
        $this->model->save($data);
        // Redirect ke halaman lihatproduk dengan membawa pesan sukses
        return redirect()->to('/dataProfil')->with('success', 'Data berhasil diperbarui');
    }
    public function edit($id)
{
    $data = [
        'title' => 'Edit Profil',
        'profile' => $this->model->find($id),
    ];

    return view('profil/dataProfil', $data);
}

}