<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comics';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'writer', 'editor', 'cover'];


    public function getComic($slug = false)
    {
        if (!$slug) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
