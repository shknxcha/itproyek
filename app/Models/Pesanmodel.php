<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesanmodel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jumlah_pesanan', 'tanggal', 'total_harga', 'id_pengguna'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}