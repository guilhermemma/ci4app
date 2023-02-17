<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Produto extends ResourceController
{
    use ResponseTrait;

    private $produtoModel;
    private $token = '2316484asf';


    public function __construct()
    {
        $this->produtoModel = new \App\Models\ProdutoModel();
    }

    private function _validaToken()
    {
        return $this->request->getHeaderLine('token') == $this->token;
    }


    public function list()
    {
        try {
            if ($data = $this->produtoModel->findAll()) {
                return $this->response->setJSON($data);
            } else {
                return $this->respond([
                    'status' => 400,
                    'message' =>  'Não encontrado'
                ]);
            }
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
            $produto = $this->request->getJSON();
            if ($this->produtoModel->insert($produto)) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'mensagem' => 'Produto cadastrado com sucesso',
                ]);
            } else {
                return $this->respond([
                    'response' => 'error',
                    'status' => 400,
                    'mensagem' => 'Erro ao cadastrar',
                    'errors' => $this->produtoModel->errors()
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


            $data = $this->produtoModel->find($id);
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

            $produto = $this->request->getJSON();
            $result = $this->produtoModel->update($id, $produto);

            if ($result) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'message' => 'Produto atualizado com sucesso'
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
            $result = $this->produtoModel->delete($id);
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
