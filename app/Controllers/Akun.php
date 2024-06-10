<?php

namespace App\Controllers;

use App\Models\M_akun;
use CodeIgniter\Controller;

class Akun extends Controller
{
    public function akun()
    {
        $model = new M_akun();
        $data['akun'] = $model->findAll();
         return view('akun/akun', $data);
    }

    public function create()
    {
        return view('create_akun');
    }

    public function store()
    {
        $model = new M_akun();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        $model->save($data);

        return redirect()->to('/akun');
    }

    public function edit($id)
    {
        $model = new M_akun();
        $data['akun'] = $model->find($id);

        // Pengecekan apakah data ditemukan
        if (empty($data['akun'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Akun with ID ' . $id . ' not found.');
        }

        return view('edit_akun', $data);
    }

    public function update($id)
    {
        $model = new M_akun();

        $data = [
            'id' => $id,
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        $model->save($data);

        return redirect()->to('/akun');
    }

    public function delete($id)
    {
        $model = new M_akun();
        $model->delete($id);

        return redirect()->to('/akun');
    }
}
