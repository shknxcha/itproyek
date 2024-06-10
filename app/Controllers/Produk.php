<?php

namespace App\Controllers;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('produk/tambahproduk');
        echo view('admin/footer');
    }
    public function lihatproduk()
    {
        echo view('admin/header');
        echo view('produk/lihatproduk');
        echo view('admin/footer');
    }
    public function editbouquet()
    {
        echo view('admin/header');
        echo view('produk/editproduk');
        echo view('admin/footer');
    }

    public function tambahproduk()
{
    $produkModel = new ProdukModel();

    if ($this->request->getMethod() === 'post' && $this->validate([
        'produk' => 'required',
        'warna' => 'required',
        'harga' => 'required',
        'ukuran' => 'required',
        'gambar' => [
            'uploaded[gambar]',
            'mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'max_size[gambar,4096]',
        ]
    ])) {
        // Jika file gambar sudah diunggah dengan benar
        if ($gambar = $this->request->getFile('gambar')) {
            // Pindahkan file gambar ke direktori yang ditentukan
            $gambar->move(ROOTPATH . 'public/uploads');

            // Tangkap data dari formulir
            $data = [
                'produk' => $this->request->getPost('produk'),
                'warna' => $this->request->getPost('warna'),
                'harga' => $this->request->getPost('harga'),
                'ukuran' => $this->request->getPost('ukuran'),
                // Dapatkan nama file gambar
                'gambar' => $gambar->getName()
            ];

            // Simpan data ke database menggunakan model
            $produkModel->tambahProduk($data);

            // Redirect ke halaman berhasil tambah produk atau halaman lainnya
            return redirect()->to('/produk')->with('status', 'Produk berhasil ditambahkan');
        }
    }

    // Jika validasi gagal atau file gambar tidak diunggah dengan benar
    return view('produk/tambahproduk', [
        'validation' => $this->validator
    ]);
}

    
    
        public function editproduk()
        {
            // Jika metode permintaan adalah POST
            if ($this->request->getMethod() === 'post') {
                // Ambil data yang dikirimkan melalui form
                $produk = $this->request->getPost('produk');
                $warna = $this->request->getPost('warna');
                $harga = $this->request->getPost('harga');
                $ukuran = $this->request->getPost('ukuran');
                // Lalu simpan ke dalam database atau lakukan operasi lainnya sesuai kebutuhan
    
                // Contoh menyimpan data ke dalam database menggunakan model
                $produkModel = new ProdukModel();
                $data = [
                    'produk' => $produk,
                    'warna' => $warna,
                    'harga' => $harga,
                    'ukuran' => $ukuran
                    // tambahkan kolom lain sesuai kebutuhan
                ];
                $produkModel->insert($data);
    
                // Redirect ke halaman lain atau tampilkan pesan sukses
                return redirect()->to('/produk')->with('status', 'Data produk berhasil disimpan');
            }
    
            // Jika metode permintaan bukan POST, tampilkan kembali halaman edit produk
            return view('edit_produk');
        }
    }
    