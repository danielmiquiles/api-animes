<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Usuarios extends ResourceController
{

    use ResponseTrait;
    protected $modelName = '\App\Models\Usuarios';
    public $logado = false;

     /**
     *  Retorna todos os animes
     */
    public function index()
    {
        $request = $this->request->getJSON();

        $email = $request->email;
        $senha = $request->senha;

        $usuario = $this->model->where('email', $email)->first();

        if(!password_verify($senha, $usuario['senha'])){
            return $this->respond(
                [
                    'mensagem' => 'Usuário e/ou Senha inválidos',
                ],
                404
            );
        }

        $this->logado = true;

        return $this->respond(
            [
                'clients' => $usuario,
                'logado' => true
            ],
            200
        );
    }


    /**
     * Cadastra novo usuario
     */
    public function store()
    {
        $request = $this->request->getJSON();
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => password_hash($request->senha, PASSWORD_DEFAULT),
            // 'token' => hash('md5', rand(1000000,9999999).$request->nome.$request->email)
        ];

        $result = $this->model->insert($data);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }
    
    
    /**
     * Altera dados do usuário 
     */
    public function update($id = null)
    {
        $data = $this->request->getJSON();
        
        $client = $this->model->update($id, $data);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 200);
    }



    /**
     * deleta usuário
     */
    public function delete($id = null)
    {

        $client = $this->model->delete($id);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 200);
    }
}
