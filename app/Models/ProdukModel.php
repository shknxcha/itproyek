<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['produk', 'warna', 'harga', 'ukuran', 'gambar', 'stok', 'id_pengguna'];

    public function tambahProduk($data)
    {
        $this->insert($data);
    }

    public function editProduk($id, $data)
    {
        $this->update($id, $data);
    }

    public function hapusProduk($id)
    {
        $this->delete($id);
    }
}
