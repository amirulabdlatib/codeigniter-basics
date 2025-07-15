<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Cuci',
            'test' => ['satu', 'dua', 'tiga'],
        ];

        return view('pages/home', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About | Cuci',
        ];

        return view('pages/about', $data);
    }
}
