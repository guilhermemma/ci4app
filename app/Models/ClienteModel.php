<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model{
  
    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'cpf', 'cnpj', 'razao_social'];
    protected $returnType = 'object';
}  