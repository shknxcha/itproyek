<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = ['judul', 'uraian', 'ikon', 'gambar', 'id_admin'];

    public function getAllProfil()
    {
        return $this->findAll();
    }

    public function getProfilById($id_profile)
    {
        return $this->find($id_profile);
    }

    public function saveProfil($data)
    {
        return $this->insert($data);
    }

    public function update_profil($id_profile, $data)
    {
        return $this->update($id_profile, $data);
    }

    public function delete_profil($id_profile)
    {
        return $this->delete($id_profile);
    }
}
