<?php 

namespace App\Models\CustomRules;
use App\Models\ClienteModel;
use App\Models\ProdutoModel;


class MycustomRules {
    public function is_valid_cliente(int $id): bool
    {
        $clienteModel = new ClienteModel();
        $cliente = $clienteModel->find($id);
        
        return $cliente == null ? false : true; 
    }
    public function is_valid_produto(int $id): bool
    {
        $produtoModel = new ProdutoModel();
        $cliente = $produtoModel->find($id);
        
        return $cliente == null ? false : true; 
    }
    

}