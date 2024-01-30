<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PeopleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'firstname' => 'Administrador',
                'lastname' => 'Principal',
                'dni' => '00000000',
                'user_id' => '00000000',
            ],
            [
                'firstname' => 'Jefe',
                'lastname' => 'Principal',
                'dni' => '87654321',
                'user_id' => '87654321',
            ],
        ];

        $this->db->table('people')->insertBatch($data);
    }
}
