<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHoursWorkedTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'hours' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'minutes' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'task_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('task_id', 'tasks', 'id');
        $this->forge->createTable('hours_worked');
    }

    public function down()
    {
        $this->forge->dropTable('hours_worked');
    }
}
