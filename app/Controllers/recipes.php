<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Recipes extends BaseController
{
    public function index()
    {
        return view('Recipes');
    }
}
