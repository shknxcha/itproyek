<?php

namespace App\Models;

use CodeIgniter\Model;

class M_akun extends Model
{
    protected $table = 'Akun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'level', 'password'];
    protected $returnType = 'object';

}
