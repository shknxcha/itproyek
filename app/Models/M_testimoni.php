<?php

namespace App\Models;

use CodeIgniter\Model;

class M_testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'uraian'];
    protected $returnType = 'object';


    
}
