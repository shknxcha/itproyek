<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    protected $allowedFields = ['judul', 'uraian', 'ikon', 'gambar', 'id_admin'];

    public function getAllProfil()
    {
        return $this->findAll();
    }

    public function getProfilById($id_profil)
    {
        return $this->find($id_profil);
    }

    public function saveProfil($data)
    {
        return $this->insert($data);
    }

    public function update_profil($id_profil, $data)
    {
        return $this->update($id_profil, $data);
    }

    public function delete_profil($id_profil)
    {
        return $this->delete($id_profil);
    }
}
