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
        $data['portofolio'] = $this->portoModel->findAll();
        return view('portofolio', $data);
    }

    public function detail($slug)
    {
        $data = [
            'blog' => $this->portoModel->getBlog($slug)
        ];

        return view('admin/detail', $data);
    }

    public function dashboard()
{
    $model = new PortoModel(); // Pastikan model ini sudah Anda buat
    $data['porto'] = $model->findAll(); // Mengambil semua data portofolio
    return view('admin/dashboard', $data);
}

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Portofolio',
            'validation' => session('validation') ?? \Config\Services::validation()
        ];

        return view('admin/create', $data);
    }

    public function save()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $this->request->getFile('gambar')->getName(),
        ];

        // Proses upload gambar
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move('img/gambar');
        }

        $this->portoModel->save($data);
        return redirect()->to('/admin');
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

        return view('admin/edit', $data);
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
