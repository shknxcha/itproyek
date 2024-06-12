<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['produk', 'warna', 'harga', 'ukuran', 'gambar', 'stok', 'id_pengguna'];
}

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['nama', 'alamat', 'id_akun', 'nohp'];
}

class PesanModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['jumlah_pesanan', 'tanggal', 'total_harga', 'struk', 'status', 'id_produk', 'id_pengguna'];

    public function tambahPesanan($data)
    {
        $this->insert($data);
    }

    public function editPesanan($id, $data)
    {
        $this->update($id, $data);
    }

    public function hapusPesanan($id)
    {
        $this->delete($id);
    }

    public function getProdukList()
    {
        return $this->db->table('produk')->select('id_produk, produk')->get()->getResultArray();
    }

    public function getPenggunaList()
    {
        return $this->db->table('pengguna')->select('id_pengguna, nama')->get()->getResultArray();
    }
}
