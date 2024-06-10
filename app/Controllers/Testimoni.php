<?php

namespace App\Controllers;

use App\Models\M_testimoni;
use CodeIgniter\Controller;

class Testimoni extends Controller
{
    public function testimoni()
    {
        $model = new M_testimoni();
        $data['testimoni'] = $model->findAll();
         return view('testimoni/testimoni', $data);
    }

    public function create()
    {
        return view('create_testimoni');
    }

    public function store()
    {
        $model = new M_testimoni();

        $data = [
            'gambar' => $this->request->getPost('gambar'),
            'uraian' => $this->request->getPost('uraian'),
        ];

        $model->save($data);

        return redirect()->to('/testimoni');
    }

    public function edit($id)
    {
        $model = new M_testimoni();
        $data['testimoni'] = $model->find($id);

        // Pengecekan apakah data ditemukan
        if (empty($data['testimoni'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Testimoni with ID ' . $id . ' not found.');
        }

        return view('edit_testimoni', $data);
    }

    public function update($id)
    {
        $model = new M_testimoni();

        $data = [
            'id' => $id,
            'gambar' => $this->request->getPost('gambar'),
            'uraian' => $this->request->getPost('uraian'),
        ];

        $model->save($data);

        return redirect()->to('/testimoni');
    }

    public function delete($id)
    {
        $model = new M_testimoni();
        $model->delete($id);

        return redirect()->to('/testimoni');
    }
}
