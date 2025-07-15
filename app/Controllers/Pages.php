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

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Cuci',
            'address' => [
                [
                    'type' => 'Rumah',
                    'address' => 'Jalan bangsar 123',
                    'town' => 'Kuala Lumpur',
                ],
                [
                    'type' => 'Office',
                    'address' => 'Jalan kota damansara 123',
                    'town' => 'Kota Damansara',
                ]
            ],
        ];

        return view('pages/contact', $data);
    }
}
