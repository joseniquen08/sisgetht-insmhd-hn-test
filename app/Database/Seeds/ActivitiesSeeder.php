<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'EESI en ciudades del Perú',
                'process_id' => 1,
            ],
            [
                'name' => 'EESM en Lima 2024',
                'process_id' => 1,
            ],
            [
                'name' => 'Elaboración de investigaciones cuantitativas o cualitativas',
                'process_id' => 1,
            ],
            [
                'name' => 'Publicación física y/o electrónica de investigaciones',
                'process_id' => 1,
            ],
            [
                'name' => 'Pasantías en investigación',
                'process_id' => 2,
            ],
            [
                'name' => 'Seminarios u otras actividades educativas',
                'process_id' => 2,
            ],
            [
                'name' => 'Reuniones administrativas',
                'process_id' => 3,
            ],
            [
                'name' => 'Fortalecimiento y estímulo a la producción científica',
                'process_id' => 3,
            ],
            [
                'name' => 'Atención de pacientes',
                'process_id' => 4,
            ],
            [
                'name' => 'Vacaciones',
                'process_id' => 5,
            ],
            [
                'name' => 'Permisos s/goce',
                'process_id' => 5,
            ],
            [
                'name' => 'Licencias por enfermedad',
                'process_id' => 5,
            ],
            [
                'name' => 'Pago de haberes',
                'process_id' => 5,
            ],
        ];

        $this->db->table('activities')->insertBatch($data);
    }
}
