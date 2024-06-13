<?php

namespace App\Controllers;

use App\Models\M_testimoni;
use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\PenggunaModel;

class Testimoni extends Controller
{
    protected $model;
    protected $produkModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->model = new M_testimoni();
        $this->produkModel = new ProdukModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Testimoni',
            'testimoni' => $this->model->select('testimoni.*, pengguna.nama as nama_pengguna')
                                       ->join('pengguna', 'pengguna.id_pengguna = testimoni.id_pengguna')
                                       ->findAll()
        ];
        return view('testimoni/testimoni', $data);
    }

    // Method lain tetap tidak berubah...



    public function formcreate()
    {
        $produkList = $this->model->getProdukList();
        $penggunaList = $this->model->getPenggunaList();

        $data = [
            'title' => 'Tambah Testimoni',
            'produkList' => $produkList,
            'penggunaList' => $penggunaList
        ];

        return view('testimoni/create_testimoni', $data);
    }

    public function store()
    {
        // Validasi input data dari form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'uraian' => 'required',
            'id_pengguna' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        // Jika validasi gagal, kembali ke halaman tambah produk dengan pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/createTestimoni')->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar"
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $namagambar = $gambar->getRandomName();
            $gambar->move(FCPATH . 'gambar_testi', $namagambar);
        } else {
            $namagambar = 'default.jpg';
            copy(FCPATH . 'adminlte/dist/img/photo3.jpg', FCPATH . 'gambar_testi/' . $namagambar);
        }

        // Data untuk disimpan ke database berdasarkan input form
        $data = [
            'uraian' => $this->request->getPost('uraian'),
            'id_pengguna' => $this->request->getPost('id_pengguna'),
            'gambar' => $namagambar,
        ];

        // Simpan data ke database
        $this->model->tambah($data);

        // Redirect ke halaman lihat produk dengan pesan sukses
        return redirect()->to('/testimoni')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['testimoni'] = $this->model->find($id);

        if (empty($data['testimoni'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Testimoni dengan ID ' . $id . ' tidak ditemukan.');
        }

        return view('testimoni/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'gambar' => $this->request->getPost('gambar'),
            'uraian' => $this->request->getPost('uraian'),
        ];

        $this->model->update($id, $data);

        return redirect()->to('/testimoni');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('/testimoni');
    }
}