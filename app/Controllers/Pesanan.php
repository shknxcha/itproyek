<?php

namespace App\Controllers;

// berfungsi untuk memanggil class ProdukModel
use App\Models\PesanModel;

class Pesanan extends BaseController
{

    // berfungsi untuk mendeklarasikan variabel produkModel
    protected $pesanModel;

    public function __construct()
    {
        // berfungsi untuk memanggil class ProdukModel
        $this->pesanModel = new PesanModel();
    }

    // berfungsi untuk menampilkan halaman list produk
    
    // berfungsi untuk menampilkan halaman tambah produk
    public function index()
    {

        // Data untuk dikirim ke view 
        $data = [
            'title' => 'Data Pesanan',
            'pesanan' => $this->pesanModel->findAll(),
        ];

        // Menampilkan view lihatproduk dan mengirimkan data
        return view('pesanan/tabelPesanan', $data);
    }
    public function formTambah()
    {

        // Data untuk dikirim ke view 
        $data = [
            'title' => 'Tambah Pesanan',
            'pesanan' => $this->pesanModel->findAll(),
        ];

        // Menampilkan view lihatproduk dan mengirimkan data
        return view('pesanan/create', $data);
    }
    

    public function tambahPesanan()
    {
        // validasi input data dari form untuk setiap atribut
        $validation = \Config\Services::validation();
        // set rules untuk validasi input data dari form untuk setiap atribut
        $validation->setRules([
            'jumlah_pesanan' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
            'struk' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        // Jika validasi gagal, kembali ke halaman tambahproduk dengan membawa pesan error
        if (!$validation->withRequest($this->request)->run()) {

            return redirect()->to('/tambahPesanan')->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar"
        $gambar = $this->request->getFile('struk');
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
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total_harga' => $this->request->getPost('total_harga'),
            'status' => $this->request->getPost('status'),
            'struk' => $namagambar, // Memastikan key ini benar
        ];

        //  var_dump($data);
        //  die;

        // Simpan data ke database melalui model produkModel yang dipanggil dari constructor Produk 
        $this->pesanModel->tambahPesanan($data);
        // Redirect ke halaman lihatproduk dengan membawa pesan sukses 
        return redirect()->to('/pesanan')->with('success', 'Data berhasil ditambahkan');

    }

    public function updatePesanan($id)
    {
        // Validasi input data dari form untuk setiap atribut
        $validation = \Config\Services::validation();
        // Set rules untuk validasi input data dari form untuk setiap atribut
        $validation->setRules([
            'jumlah_pesanan' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
            'struk' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        // Jika validasi gagal, kembali ke halaman editproduk dengan membawa pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/pesanan/edit/' . $id)->withInput()->with('validation', $validation);
        }

        // Ambil file gambar dari form input dengan name="gambar" jika ada
        $gambar = $this->request->getFile('struk');
        // Ambil nama file gambar lama dari form input dengan name="gambar_lama"
        $gambar_lama = $this->request->getPost('gambar_lama');
        // Dapatkan data produk berdasarkan id
        $pesanan = $this->pesanModel->find($id);

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
            'id_pesanan' => $id,
            'jumlah_pesanan' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tangga'),
            'total_harga' => $this->request->getPost('total_harga'),
            'status' => $this->request->getPost('status'),
            'struk' => $namagambar, // Nama gambar baru atau lama
        ];

        // var_dump($data);
        // die;

        // Simpan data ke database melalui model produkModel yang dipanggil dari constructor Produk
        $this->pesanModel->save($data);
        // Redirect ke halaman lihatproduk dengan membawa pesan sukses
        return redirect()->to('/index')->with('success', 'Data berhasil diperbarui');
    }


    public function hapusPesanan($id)
    {
        // Dapatkan data produk berdasarkan id
        $pesanan = $this->pesanModel->find($id);

        // Jika produk ditemukan maka hapus data produk dan gambar 
        if ($pesanan) {
            // Hapus gambar jika bukan default.jpg
            if ($pesanan['struk'] != 'default.jpg') {
                if (file_exists(FCPATH . 'gambar_produk/' . $pesanan['gambar'])) {
                    unlink(FCPATH . 'gambar_pesanan/' . $pesanan['gambar']);
                }
            }

            // Hapus data produk dari database
            $this->pesanModel->delete($id);

            // Redirect ke halaman lihatproduk dengan membawa pesan sukses
            return redirect()->to('/dataPesanan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/dataPesanan')->with('error', 'Produk tidak ditemukan');
        }
    }


}