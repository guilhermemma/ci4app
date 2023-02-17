<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],

            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],

            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],

            'senha' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false

            ]



        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuario', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}
