<?php

namespace App\Controllers;
use App\Models\PortoModel;

class Portofolio extends BaseController
{
    public function index()
    {
        $model = new PortoModel();
        $data['porto'] = $model->findAll(); // ambil semua data blog

        return view('portofolio', $data); // kirim ke view
    }
}