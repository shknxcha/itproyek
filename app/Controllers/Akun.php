<?php

namespace App\Controllers;

use App\Models\M_akun;
use App\Models\PenggunaModel;

class Akun extends BaseController
{
    public function index()
    {
        $akunModel = new M_akun();
        $data['akun'] = $akunModel->findAll();
        $data['title'] = 'Daftar Akun';
        return view('akun/listAkun', $data);
    }

    public function register()
    {
        return view('login/register');
    }

    public function create()
    {
        $akunModel = new M_akun();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => 'user'
        ];

        $akunModel->insert($data);
        return redirect()->to('/login/login')->with('success', 'Akun berhasil dibuat.');
    }

    public function editProfile()
    {
        $id = session()->get('id_akun');
        $akunModel = new M_akun();
        $penggunaModel = new PenggunaModel();

        $data['akun'] = $akunModel->find($id);
        $data['pengguna'] = $penggunaModel->where('id_akun', $id)->first();
        return view('akun/edit_akun', $data);
    }

    public function updateProfile()
    {
        $id = session()->get('id_akun');
        $akunModel = new M_akun();
        $penggunaModel = new PenggunaModel();

        $dataAkun = [
            'username' => $this->request->getPost('username')
        ];

        if ($this->request->getPost('password')) {
            $dataAkun['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $dataPengguna = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        ];

        $akunModel->update($id, $dataAkun);
        $penggunaModel->where('id_akun', $id)->set($dataPengguna)->update();

        return redirect()->to('/akun/editProfile')->with('success', 'Profil berhasil diubah.');
    }

    public function delete($id)
    {
        $akunModel = new M_akun();
        $akunModel->delete($id);
        return redirect()->to('/akun')->with('success', 'Akun berhasil dihapus.');
    }
}