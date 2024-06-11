<?php

namespace App\Models;

use CodeIgniter\Model;

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
}