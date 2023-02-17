<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model{
  
    protected $table = 'pedido_compra';
    protected $primaryKey = 'id';
    protected $allowedFields = ['status', 'cliente_id', 'produto_id',];
    protected $returnType = 'object';

    protected $validationRules =[
        'cliente_id' => 'is_valid_cliente',
        'produto_id' => 'is_valid_produto',

    ];
    
    }  