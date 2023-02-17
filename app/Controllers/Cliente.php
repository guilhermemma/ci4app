<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Cliente extends ResourceController
{
    use ResponseTrait;

    private $clienteModel;


    public function __construct()
    {
        $this->clienteModel = new \App\Models\ClienteModel();
    }



    public function list()
    {
        try {
            if ($data = $this->clienteModel->findAll()) {
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
            $cliente = $this->request->getJSON();

            if ($this->clienteModel->insert($cliente)) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'mensagem' => 'Cliente cadastrado com sucesso',
                ]);
            } else {
                return $this->respond([
                    'response' => 'error',
                    'status' => 400,
                    'mensagem' => 'Erro ao cadastrar',
                    'errors' => $this->clienteModel->errors()
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


            $data = $this->clienteModel->find($id);
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

            $result = $this->clienteModel->update($id, $produto);

            if ($result) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'message' => 'Cliente atualizado com sucesso'
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

            $result = $this->clienteModel->delete($id);

            if ($result) {
                return $this->respond([
                    'response' => 'Sucesso',
                    'status' => 200,
                    'message' => 'Cliente Deletado com sucesso'
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
