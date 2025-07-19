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

    public function create()
    {
        $data = [
            'title' => 'Create Comic',
            'validation' => session('validation')
        ];

        return view('comics/create', $data);
    }

    public function save()
    {

        $validation = $this->validate([
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => '{field} field is required',
                    'is_unique' => 'This comic {field} title already exists, please choose another one.'
                ]
            ],
            'writer' => 'required',
            'editor' => 'required',
            'cover' => 'required'
        ]);

        if (!$validation) {

            // way 1
            // $validation = \Config\Services::validation();

            // return redirect()->to('/comic/create')
            //     ->withInput()
            //     ->with('validation', $validation);

            // way 2
            return redirect()->to('/comic/create')
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'writer' => $this->request->getVar('writer'),
            'editor' => $this->request->getVar('editor'),
            'cover' => $this->request->getVar('cover'),

        ]);

        session()->setFlashdata('message', 'Comic created successfully.');

        return redirect()->to(base_url('comic'));
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

        return view('comics/detail', $data);
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);

        session()->setFlashdata('message', 'Comic deleted successfully.');

        return redirect()->to(base_url('/comic'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Comic',
            'validation' => session('validation'),
            'comic' => $this->comicModel->find($id)
        ];

        return view('comics/edit', $data);
    }

    public function update($id)
    {

        $comic = $this->comicModel->find($id);

        $titleRule = ($comic['title'] === $this->request->getVar('title'))
            ? 'required'
            : 'required|is_unique[comics.title]';

        $validation = $this->validate([
            'title' => [
                'rules' =>  $titleRule,
                'errors' => [
                    'required' => '{field} field is required',
                    'is_unique' => 'This comic {field} title already exists, please choose another one.'
                ]
            ],
            'writer' => 'required',
            'editor' => 'required',
            'cover' => 'required'
        ]);

        if (!$validation) {
            return redirect()->to('/comic/edit/' . $id)
                ->withInput()
                ->with('validation', $this->validator);
        }

        $this->comicModel->update($id, [
            'title' => $this->request->getVar('title'),
            'slug' => url_title($this->request->getVar('title'), '-', true),
            'writer' => $this->request->getVar('writer'),
            'editor' => $this->request->getVar('editor'),
            'cover' => $this->request->getVar('cover'),

        ]);

        session()->setFlashdata('message', 'Comic updated successfully.');

        return redirect()->to(base_url('comic'));
    }
}
