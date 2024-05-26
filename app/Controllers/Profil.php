<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    public function index()
    {
        // $model = new ProfilModel();
        // $data['profils'] = $model->getAllProfil();
        
        echo view('admin/header');
        echo view('profil/tabelProfil');
        echo view('admin/footer');
    }

    public function tambahProfil()
    {
        echo view('admin/header');
        echo view('profil/tambahProfil');
        echo view('admin/footer');
    }

    public function tampilProfil($id_profil)
    {
        $model = new ProfilModel();
        $data['profil'] = $model->getProfilById($id_profil);

        return view('profil/tampil', $data);
    }

    public function editProfil($id_profil)
    {
        $model = new ProfilModel();
        $data['profil'] = $model->getProfilById($id_profil);

        return view('profil/edit', $data);
    }

    public function updateProfil($id_profil)
    {
        $model = new ProfilModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'uraian' => $this->request->getPost('uraian'),
            'ikon' => $this->request->getPost('ikon'),
            'gambar' => $this->request->getPost('gambar'),
            'id_admin' => $this->request->getPost('id_admin')
        ];
        $model->update_profil($id_profil, $data);

        return redirect()->to('/profil');
    }

    public function hapusProfil($id_profil)
    {
        $model = new ProfilModel();
        $model->delete_profil($id_profil);

        return redirect()->to('/profil');
    }
}
