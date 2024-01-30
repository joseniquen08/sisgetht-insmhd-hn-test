<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainTasksSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProcessesSeeder');
        $this->call('ActivitiesSeeder');
        $this->call('TasksSeeder');
    }
}
