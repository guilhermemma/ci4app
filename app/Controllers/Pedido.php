<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\PedidoModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Pedido extends ResourceController
{
    use ResponseTrait;

    private $pedidoModel;



    public function __construct()
    {
        $this->pedidoModel = new \App\Models\PedidoModel();
    }



    public function list()
    {
        try {
            if ($data = $this->pedidoModel->findAll()) {
                return $this->response->setJSON($data);
            } else {
                return $this->respond([
                    'status' => 400,
                    'message' =>  'Não encontrado'
                ]);
            }
            $this->response->setJSON($data);
        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro ao Listar',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }


    public function create()
    {

        try {
            $pedido = $this->request->getJSON();

            if ($this->pedidoModel->insert($pedido)) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'mensagem' => 'Pedido cadastrado com sucesso',
                ]);
            } else {
                return $this->respond([
                    'response' => 'error',
                    'status' => 400,
                    'mensagem' => 'Erro ao cadastrar',
                    'errors' => $this->pedidoModel->errors()
                ]);
            }
        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro ao cadastrar',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }


    public function show($id = null)
    {
        try {
            if (is_null($id)) {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => 'Id não inserido'
                ]);
            }


            $data = $this->pedidoModel->find($id);
            if ($data) {
                return $this->response->setJSON($data);
            } else {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => $id . ' Não encontrado'
                ]);
            }
        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro ao Consulta',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }

    public function update($id = null)
    {
        try {
            if (is_null($id)) {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => 'Id não inserido'
                ]);
            }
            $pedido = $this->request->getJSON();

            $result = $this->pedidoModel->update($id, $pedido);

            if ($result) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'message' => 'Pedido atualizado com sucesso'
                ]);
            } else {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => 'Erro ao atualizar'
                ]);
            }
        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro ao Atualizar',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }

    public function delete($id = null)
    {
        try {
            if (is_null($id)) {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => 'Id não inserido'
                ]);
            }
            $result = $this->pedidoModel->delete($id);
            if ($result) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'message' => 'Produto Deletado com sucesso'
                ]);
            } else {
                return $this->respond([
                    'response' => 'Erro',
                    'status' => 400,
                    'message' => 'Erro ao deletar'
                ]);
            }
        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro ao Excluir',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }
}
