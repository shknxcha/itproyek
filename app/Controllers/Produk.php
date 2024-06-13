<?php

namespace App\Controllers;

// berfungsi untuk memanggil class ProdukModel
use App\Models\ProdukModel;

class Produk extends BaseController
{

    // berfungsi untuk mendeklarasikan variabel produkModel
    protected $produkModel;

    public function __construct()
    {
        // berfungsi untuk memanggil class ProdukModel
        $this->produkModel = new ProdukModel();
    }

    // berfungsi untuk menampilkan halaman list produk
    public function index()
    {
        echo view('admin/header');
        echo view('produk/tambahproduk');
        echo view('admin/footer');
    }
    // berfungsi untuk menampilkan halaman tambah produk
    public function lihatproduk()
    {

        // Data untuk dikirim ke view 
        $data = [
            'title' => 'Data Produk',
            'produk' => $this->produkModel->findAll(),
        ];


        echo view('admin/header');
        // Menampilkan view lihatproduk dan mengirimkan data
        echo view('produk/lihatproduk', $data);
        echo view('admin/footer');
    }
    public function editproduk()
    {
        echo view('admin/header');
        echo view('produk/editproduk');
        echo view('admin/footer');
    }

    public function tambahproduk()
    {
        // validasi input data dari form untuk setiap atribut
        $validation = \Config\Services::validation();
        // set rules untuk validasi input data dari form untuk setiap atribut
        $validation->setRules([
            'produk' => 'required',
            'harga' => 'required|numeric',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        // Jika validasi gagal, kembali ke halaman tambahproduk dengan membawa pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/tambahproduk')->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar"
        $gambar = $this->request->getFile('gambar');
        // Memastikan file gambar valid dan telah diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Simpan nama file gambar ke dalam array data
            $namagambar = $gambar->getRandomName();
            // Pindahkan file gambar ke direktori yang diinginkan
            $gambar->move(FCPATH . 'gambar_produk', $namagambar);
        } else {
            // Jika file gambar tidak valid atau tidak diunggah, gunakan default.jpg
            $namagambar = 'default.jpg'; // Nama file default yang disimpan di folder 'gambar_produk'
            copy(FCPATH . 'adminlte/dist/img/photo3.jpg', FCPATH . 'gambar_produk/' . $namagambar);
        }

        // Data untuk disimpan ke database berdasarkan input form tambahproduk
        $data = [
            'produk' => $this->request->getPost('produk'),
            'harga' => $this->request->getPost('harga'),
            'warna' => $this->request->getPost('warna'),
            'ukuran' => $this->request->getPost('ukuran'),
            'gambar' => $namagambar, // Memastikan key ini benar
            'stok' => $this->request->getPost('stok')
        ];

        // var_dump($data);
        // die;

        // Simpan data ke database melalui model produkModel yang dipanggil dari constructor Produk 
        $this->produkModel->tambahProduk($data);
        // Redirect ke halaman lihatproduk dengan membawa pesan sukses 
        return redirect()->to('/lihatproduk')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateProduk($id)
    {
        // Validasi input data dari form untuk setiap atribut
        $validation = \Config\Services::validation();
        // Set rules untuk validasi input data dari form untuk setiap atribut
        $validation->setRules([
            'produk' => 'required',
            'harga' => 'required|numeric',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required|integer',
            'gambar' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        // Jika validasi gagal, kembali ke halaman editproduk dengan membawa pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/editproduk' . $id)->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar" jika ada
        $gambar = $this->request->getFile('gambar');
        // Ambil nama file gambar lama dari form input dengan name="gambar_lama"
        $gambar_lama = $this->request->getPost('gambar_lama');
        // Dapatkan data produk berdasarkan id
        $produk = $this->produkModel->find($id);

        // Jika file gambar baru diunggah, valid dan belum dipindah maka pindahkan file gambar
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Simpan nama file gambar baru
            $namagambar = $gambar->getRandomName();
            // Pindahkan file gambar ke direktori yang diinginkan
            $gambar->move(FCPATH . 'gambar_produk', $namagambar);
            // Hapus gambar lama jika bukan default.jpg
            if ($gambar_lama != 'default.jpg') {
                if (file_exists(FCPATH . 'gambar_produk/' . $gambar_lama)) {
                    unlink(FCPATH . 'gambar_produk/' . $gambar_lama);
                }
            }
            // Jika file gambar baru diunggah, gunakan gambar baru 
        } else {
            // Jika tidak ada gambar baru diunggah, gunakan gambar lama
            $namagambar = $gambar_lama;
        }

        // Data untuk disimpan ke database berdasarkan input form editproduk 
        $data = [
            'id_produk' => $id,
            'produk' => $this->request->getPost('produk'),
            'harga' => $this->request->getPost('harga'),
            'warna' => $this->request->getPost('warna'),
            'ukuran' => $this->request->getPost('ukuran'),
            'gambar' => $namagambar, // Nama gambar baru atau lama
            'stok' => $this->request->getPost('stok')
        ];

        // var_dump($data);
        // die;

        // Simpan data ke database melalui model produkModel yang dipanggil dari constructor Produk
        $this->produkModel->save($data);
        // Redirect ke halaman lihatproduk dengan membawa pesan sukses
        return redirect()->to('/lihatproduk')->with('success', 'Data berhasil diperbarui');
    }


    public function hapusProduk($id)
    {
        // Dapatkan data produk berdasarkan id
        $produk = $this->produkModel->find($id);

        // Jika produk ditemukan maka hapus data produk dan gambar 
        if ($produk) {
            // Hapus gambar jika bukan default.jpg
            if ($produk['gambar'] != 'default.jpg') {
                if (file_exists(FCPATH . 'gambar_produk/' . $produk['gambar'])) {
                    unlink(FCPATH . 'gambar_produk/' . $produk['gambar']);
                }
            }

            // Hapus data produk dari database
            $this->produkModel->delete($id);

            // Redirect ke halaman lihatproduk dengan membawa pesan sukses
            return redirect()->to('/lihatproduk')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/lihatproduk')->with('error', 'Produk tidak ditemukan');
        }
    }


}