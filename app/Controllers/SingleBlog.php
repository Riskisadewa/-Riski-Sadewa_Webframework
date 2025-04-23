<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SingleBlog extends BaseController
{
    public function index()
    {
        return view('single-blog');
    }
}
