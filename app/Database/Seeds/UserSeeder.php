<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Ahmad',
            'address'    => '108 Jalan ABC',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        // Simple Queries
        // $this->db->query(
        // 'INSERT INTO users (name, address,created_at,updated_at) 
        //  VALUES(:name:, :address:,:created_at:,:updated_at:)'
        // ,$data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
