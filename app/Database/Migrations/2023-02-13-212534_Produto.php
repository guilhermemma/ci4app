<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'auto_increment' => true
            ],
    
            'nome_produto' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false    
            ],
    
            'valor' =>[
                'type' => 'DOUBLE',
                'null' => false
                
            ]
            
            ]);
            
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('produto', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        $this->forge->dropTable('produto');
    }
}
