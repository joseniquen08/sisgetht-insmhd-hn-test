<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeopleTable extends Migration
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
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'dni' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'birthday' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
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
        $this->forge->addKey('dni', false, true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('people');
    }

    public function down()
    {
        $this->forge->dropTable('people');
    }
}
