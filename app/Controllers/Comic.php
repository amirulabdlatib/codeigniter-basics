<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{

    protected $comicModel; 

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        // Way 1 : way to connect db without model
        // $db = \Config\Database::connect();

        // $comics = $db->query("SELECT * FROM comics");

        // foreach($comics->getResultArray() as $row){
        //     d($row);
        // }

        $comics =  $this->comicModel->getComic();
        
        $data = [
            'title' => 'Register Comic',
            'comics' => $comics,
        ];


        return view('comics/index', $data);
    }
    
    public function detail($slug)
    {
        $comic = $this->comicModel->getComic($slug);

        if (empty($comic)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Comic with slug '$slug' not found.");
        }

        $data = [
            'title' => 'Comic Detail',
            'comic' => $comic,
        ];

        return view('comics/detail',$data);

    }
}
