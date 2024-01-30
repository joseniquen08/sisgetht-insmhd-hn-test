<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProcessesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'INVESTIGACIÓN',
            ],
            [
                'name' => 'CAPACITACIÓN Y DOCENCIA',
            ],
            [
                'name' => 'GESTIÓN',
            ],
            [
                'name' => 'ASISTENCIAL',
            ],
            [
                'name' => 'LABORALES',
            ],
        ];

        $this->db->table('processes')->insertBatch($data);
    }
}
