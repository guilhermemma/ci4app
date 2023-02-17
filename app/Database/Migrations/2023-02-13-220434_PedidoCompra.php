<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PedidoCompra extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type' => 'INT',
                'auto_increment' => true
            ],
    
            'status' =>[
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false    
            ],
    
            'cliente_id' =>[
                'type' => 'int'                
            ],

            'produto_id' =>[
                'type' => 'int'                
            ]
            
            ]);
            
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('cliente_id', 'cliente', 'id');
            $this->forge->addForeignKey('produto_id', 'produto', 'id');
            $this->forge->createTable('pedido_compra', true, ['engine' => 'innodb']);

    }

    public function down()
    {
        $this->forge->dropTable('pedido_compra');
    }
}
