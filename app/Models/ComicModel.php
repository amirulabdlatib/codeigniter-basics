<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comics';
    protected $useTimestamps = false;

    public function getComic($slug = false)
    {
        if(!$slug){
            return $this->findAll();
        }

        return $this->where(['slug'=>$slug])->first();
    }
}
