<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Análisis estadístico',
                'activity_id' => 1,
            ],
            [
                'name' => 'Transcripción y tabulación de datos',
                'activity_id' => 1,
            ],
            [
                'name' => 'Elaboración y revisión de informe',
                'activity_id' => 1,
            ],
            [
                'name' => 'Elaboración de protocolo',
                'activity_id' => 2,
            ],
            [
                'name' => 'Elaboración de presupuesto',
                'activity_id' => 2,
            ],
            [
                'name' => 'Elaboración y diseño de la muestra',
                'activity_id' => 2,
            ],
            [
                'name' => 'Elaboración de programa para ingreso de datos',
                'activity_id' => 2,
            ],
            [
                'name' => 'Elaboración de artículo',
                'activity_id' => 2,
            ],
            [
                'name' => 'Elaboración de perfil de proyecto',
                'activity_id' => 3,
            ],
            [
                'name' => 'Reuniones de coordinación',
                'activity_id' => 3,
            ],
            [
                'name' => 'Elaboración de protocolos',
                'activity_id' => 3,
            ],
            [
                'name' => 'Elaboración de artículo científico',
                'activity_id' => 3,
            ],
            [
                'name' => 'Transcripción y tabulación de datos',
                'activity_id' => 4,
            ],
            [
                'name' => 'Control de calidad de datos',
                'activity_id' => 4,
            ],
            [
                'name' => 'Elaboración de informe',
                'activity_id' => 4,
            ],
            [
                'name' => 'Publicación (física y/o electrónica)',
                'activity_id' => 4,
            ],
            [
                'name' => 'Tutoría individual',
                'activity_id' => 5,
            ],
            [
                'name' => 'Tutoría individual',
                'activity_id' => 6,
            ],
            [
                'name' => 'Evaluación de residentes',
                'activity_id' => 6,
            ],
            [
                'name' => 'Tutoría colectiva',
                'activity_id' => 6,
            ],
            [
                'name' => 'Planeamiento y preparación de actividades educativas',
                'activity_id' => 6,
            ],
            [
                'name' => 'Otras actividades académicas u educativas',
                'activity_id' => 6,
            ],
            [
                'name' => 'Reuniones ordinarias',
                'activity_id' => 7,
            ],
            [
                'name' => 'Reuniones extraordinarias',
                'activity_id' => 7,
            ],
            [
                'name' => 'Reuniones del CEI',
                'activity_id' => 7,
            ],
            [
                'name' => 'Reuniones de otros Comités',
                'activity_id' => 7,
            ],
            [
                'name' => 'Seguimiento y monitoreo de proyectos de investigación',
                'activity_id' => 8,
            ],
            [
                'name' => 'Asesoría de redacción de documento científico',
                'activity_id' => 8,
            ],
            [
                'name' => 'Guardia diurna',
                'activity_id' => 9,
            ],
            [
                'name' => 'Atención Psiquiátrica',
                'activity_id' => 9,
            ],
            [
                'name' => 'Guardia nocturna',
                'activity_id' => 9,
            ],
            [
                'name' => 'Vacaciones',
                'activity_id' => 10,
            ],
            [
                'name' => 'Permisos s/goce',
                'activity_id' => 11,
            ],
            [
                'name' => 'Licencias por enfermedad',
                'activity_id' => 12,
            ],
            [
                'name' => 'Pago de haberes',
                'activity_id' => 13,
            ],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}
