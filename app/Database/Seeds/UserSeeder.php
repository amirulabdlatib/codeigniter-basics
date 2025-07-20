<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $fake = \Faker\Factory::create();

        $data = [
            'name' => $fake->name(),
            'address'    => $fake->address,
            'created_at' => Time::createFromTimestamp($fake->unixTime()),
            'updated_at' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
