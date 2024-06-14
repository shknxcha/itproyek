<?php

namespace App\Models;

use CodeIgniter\Model;

class M_akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['username', 'password', 'level', 'email', 'reset_token', 'token_expiry'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }

    public function getSetAkun($id)
    {
        return $this->where('id_akun', $id)->first(); // Mengambil data profil berdasarkan ID
    }

    public function updateAkun($id, $data)
    {
        $this->update($id, $data);
    }
}
