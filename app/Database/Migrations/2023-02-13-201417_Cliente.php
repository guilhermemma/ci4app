<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id' =>[
            'type' => 'INT',
            'auto_increment' => true
        ],

        'nome' =>[
            'type' => 'VARCHAR',
            'constraint' => 200,
            'null' => false    
        ],

        'cpf' =>[
            'type' => 'VARCHAR',
            'constraint' => 200,
            'null' => false
        ],

        'cnpj' =>[
            'type' => 'VARCHAR',
            'constraint' => 200,
            'null' => true
            
        ],

        'razao_social' =>[
            'type' => 'VARCHAR',
            'constraint' => 200,
            'null' => true
            
        ]
        
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('cliente', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('cliente');
    }
}
