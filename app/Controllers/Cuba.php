<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Cuba extends BaseController
{
    public function index()
    {
        echo "Ini controller Cuba method index";
    }

    public function about($nama='')
    {
        echo "Halo nama saya $nama";
    }
}
