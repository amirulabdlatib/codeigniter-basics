<?php

namespace App\Controllers;

class Comic extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Register Comic'
        ];

        return view('comics/index', $data);
    }
}
