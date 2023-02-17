<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\API\ResponseTrait;
use Exception;
use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;

class Auth extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper('secure_password');
    }

    public function login()
    {


        try {
            $usuarioModel = new UsuarioModel();
            $usuario = $this->request->getPost('usuario');
            $senha = $this->request->getPost('senha');


            $validaUsuario = $usuarioModel->where('usuario', $usuario)->first();

            if ($validaUsuario) {
                $verify_password = password_verify($senha, $validaUsuario['senha']);
                if ($verify_password) {
                    return $this->respond([
                        'status' => 200,
                        'message' => 'Sucesso',
                    ]);
                } else {
                    return $this->respondCreated([
                        'status' => 0,
                        'message' => 'Senha e Usuario invalido',
                    ]);
                }
            }
    

        } catch (Exception $e) {
            return $this->respond([
                'response' => 'error',
                'status' => 400,
                'mensagem' => 'Erro no servidor',
                'errors' => ['exception' => $e->getMessage()]

            ]);
        }
    }
    protected function generateJWT(){

    }
}
