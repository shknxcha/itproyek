<?php

namespace App\Controllers;

// berfungsi untuk memanggil class ProdukModel
use App\Models\PesanModel;
use App\Models\ProdukModel;
use App\Models\PenggunaModel;

class Pesanan extends BaseController
{

    protected $pesanModel;
    protected $produkModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->produkModel = new ProdukModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $pesanan = $this->pesanModel
            ->select('pesanan.*, produk.produk as nama_produk, pengguna.nama as nama_pengguna')
            ->join('produk', 'produk.id_produk = pesanan.id_produk')
            ->join('pengguna', 'pengguna.id_pengguna = pesanan.id_pengguna')
            ->findAll();
    
        return view('pesanan/tabelPesanan', ['pesanan' => $pesanan]);
    }


    public function formTambah()
{
    $produkList = $this->pesanModel->getProdukList();
    $penggunaList = $this->pesanModel->getPenggunaList();

    $data = [
        'title' => 'Tambah Pesanan',
        'produkList' => $produkList,
        'penggunaList' => $penggunaList
    ];

    return view('pesanan/create', $data);
}

public function prosesTambah()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'jumlah_pesanan' => 'required',
        'tanggal' => 'required',
        'total_harga' => 'required',
        'status' => 'required',
        'id_produk' => 'required',
        'id_pengguna' => 'required',
        'struk' => 'max_size[struk,2048]|is_image[struk]|mime_in[struk,image/jpg,image/jpeg,image/png]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to('/pesanan/formTambah')->withInput()->with('validation', $validation);
    }

    $gambar = $this->request->getFile('struk');
    $namagambar = 'default.jpg';
    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
        $namagambar = $gambar->getRandomName();
        $gambar->move(FCPATH . 'gambar_produk', $namagambar);
    }

    $data = [
        'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
        'tanggal' => $this->request->getPost('tanggal'),
        'total_harga' => $this->request->getPost('total_harga'),
        'status' => $this->request->getPost('status'),
        'id_produk' => $this->request->getPost('id_produk'),
        'id_pengguna' => $this->request->getPost('id_pengguna'),
        'struk' => $namagambar,
    ];

    $this->pesanModel->tambahPesanan($data);
    return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil ditambahkan');
}


public function updatePesanan($id)
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'jumlah_pesanan' => 'required',
        'tanggal' => 'required',
        'total_harga' => 'required',
        'status' => 'required',
        'id_produk' => 'required',
        'id_pengguna' => 'required',
        'struk' => 'max_size[struk,2048]|is_image[struk]|mime_in[struk,image/jpg,image/jpeg,image/png]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to('/pesanan' . $id)->withInput()->with('validation', $validation);
    }

    $gambar = $this->request->getFile('struk');
    $gambar_lama = $this->request->getPost('struk_lama');
    $pesanan = $this->pesanModel->find($id);

    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
        $namagambar = $gambar->getRandomName();
        $gambar->move(FCPATH . 'gambar_produk', $namagambar);
        if ($gambar_lama != 'default.jpg') {
            if (file_exists(FCPATH . 'gambar_produk/' . $gambar_lama)) {
                unlink(FCPATH . 'gambar_produk/' . $gambar_lama);
            }
        }
    } else {
        $namagambar = $gambar_lama;
    }

    $data = [
        'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
        'tanggal' => $this->request->getPost('tanggal'),
        'total_harga' => $this->request->getPost('total_harga'),
        'status' => $this->request->getPost('status'),
        'id_produk' => $this->request->getPost('id_produk'),
        'id_pengguna' => $this->request->getPost('id_pengguna'),
        'struk' => $namagambar,
    ];

    if (!$this->pesanModel->updatePesanan($id, $data)) {
        // Tambahkan pesan debugging di sini
        return redirect()->to('/pesanan/edit/' . $id)->withInput()->with('error', 'Gagal memperbarui pesanan. Silakan coba lagi.');
    }

    return redirect()->to('/pesanan')->with('success', 'Data berhasil diperbarui');
}


    public function edit($id)
{
    $pesanan = $this->pesanModel->find($id);
    if (!$pesanan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Pesanan dengan ID ' . $id . ' tidak ditemukan');
    }

    $produkList = $this->pesanModel->getProdukList();
    $penggunaList = $this->pesanModel->getPenggunaList();

    $data = [
        'title' => 'Edit Pesanan',
        'pesanan' => $pesanan,
        'produkList' => $produkList,
        'penggunaList' => $penggunaList
    ];

    return view('pesanan/edit', $data);
}

public function hapusPesanan($id)
{
    // Dapatkan data pesanan berdasarkan id
    $pesanan = $this->pesanModel->find($id);

    if ($pesanan) {
        // Hapus gambar jika bukan default.jpg
        if ($pesanan['struk'] != 'default.jpg') {
            if (file_exists(FCPATH . 'gambar_produk/' . $pesanan['struk'])) {
                unlink(FCPATH . 'gambar_produk/' . $pesanan['struk']);
            }
        }
        
        // Hapus data pesanan dari database
        $this->pesanModel->delete($id);

        // Redirect ke halaman data pesanan dengan membawa pesan sukses
        return redirect()->to('/pesanan')->with('success', 'Data berhasil dihapus');
    } else {
        // Jika pesanan tidak ditemukan, redirect dengan pesan error
        return redirect()->to('/pesanan')->with('error', 'Pesanan tidak ditemukan');
    }
}

}