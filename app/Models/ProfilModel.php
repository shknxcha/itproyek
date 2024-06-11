<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['gambar', 'ikon', 'uraian', 'keterangan', 'judul'];

}