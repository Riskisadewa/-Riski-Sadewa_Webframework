<?php

namespace App\Controllers;

use App\Models\PortoModel;

class Admin extends BaseController
{
    protected $portoModel;

    public function __construct()
    {
        $this->portoModel = new PortoModel();
    }

    public function index()
    {
        helper(['text']); 
        $data = [
            'blog' => $this->portoModel->getBlog()
        ];

        return view('/admin/dashboard', $data);
    }

    public function detail($slug)
    {
        $data = [
            'blog' => $this->portoModel->getBlog($slug)
        ];

        return view('/admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Portofolio',
            'validation' => session('validation') ?? \Config\Services::validation()
        ];

        return view('/admin/create', $data);
    }

    public function save()
    {
        $model = new PortoModel();
    
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $this->request->getFile('gambar')->getName(),
            // tambahkan field lain jika diperlukan
        ];
    
        // Proses upload gambar
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move('img/gambar');
        }
    
        $model->save($data);
        return redirect()->to('/admin/portofolio');
    }    

    public function delete($id)
    {
        $this->portoModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Portofolio',
            'validation' => session('validation') ?? \Config\Services::validation(),
            'blog' => $this->portoModel->asArray()->where('slug', $slug)->first()
        ];

        return view('/admin/edit', $data);
    }

    public function update($id)
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->portoModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar' => $this->request->getVar('gambar')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin');
    }
}

class Portofolio extends BaseController
{
    public function index()
    {
        $model = new PortoModel();
        $data['blog'] = $model->findAll(); // ambil semua data blog

        return view('portofolio', $data); // kirim ke view
    }
}
