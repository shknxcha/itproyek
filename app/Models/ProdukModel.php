<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produk', 'warna', 'harga', 'ukuran', 'gambar'];

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
