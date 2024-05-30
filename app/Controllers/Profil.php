<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    public function index()
    {
        $model = new ProfilModel();
        $data['profile'] = $model->getAllProfil();
        
        echo view('admin/header');
        echo view('profil/tabelProfil', $data);
        echo view('admin/footer');
    }

    public function saveProfil()
{
    $model = new ProfilModel();

    // Gather form data
    $data = [
        'judul' => $this->request->getPost('judul'),
        'uraian' => $this->request->getPost('uraian'),
        'keterangan' => $this->request->getPost('keterangan'),
        'ikon' => $this->request->getFile('ikon'),
        'gambar' => $this->request->getFile('gambar'),
        'id_admin' => $this->request->getPost('id_admin')
    ];


    // Handle file uploads if needed
    if ($data['ikon'] && $data['ikon']->isValid() && !$data['ikon']->hasMoved()) {
        $newName = $data['ikon']->getRandomName();
        $data['ikon']->move(WRITEPATH . 'uploads', $newName);
        $data['ikon'] = $newName;
    } else {
        $data['ikon'] = null; // or handle as needed
    }

    if ($data['gambar'] && $data['gambar']->isValid() && !$data['gambar']->hasMoved()) {
        $newName = $data['gambar']->getRandomName();
        $data['gambar']->move(WRITEPATH . 'uploads', $newName);
        $data['gambar'] = $newName;
    } else {
        $data['gambar'] = null; // or handle as needed
    }

    // Save the profile data
    $model->saveProfil($data);

    return redirect()->to('/profil');
}


    // public function tampilProfil($id_profile)
    // {
    //     $model = new ProfilModel();
    //     $data['profile'] = $model->getProfilById($id_profile);

    //     return view('profil/tampil', $data);
    // }

    public function editProfil($id_profile)
    {
        $model = new ProfilModel();
        $data['profile'] = $model->getProfilById($id_profile);

        return view('profil/edit', $data);
    }

    public function updateProfil($id_profile)
    {
        $model = new ProfilModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'uraian' => $this->request->getPost('uraian'),
            'ikon' => $this->request->getPost('ikon'),
            'gambar' => $this->request->getPost('gambar'),
            'id_admin' => $this->request->getPost('id_admin')
        ];
        $model->update_profil($id_profile, $data);

        return redirect()->to('/profil');
    }

    public function hapusProfil($id_profile)
    {
        $model = new ProfilModel();
        $model->delete_profil($id_profile);

        return redirect()->to('/profil');
    }
}