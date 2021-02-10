<?php

namespace App\Controllers;

// use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\API\ResponseTrait;
// use Exception;
// use Firebase\JWT\JWT;

use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;
use ReflectionException;

class Usuarios extends ResourceController
{

    // use ResponseTrait;
    protected $modelName = '\App\Models\Usuarios';

    /**
     *  Retorna todos os animes
     */
    public function index()
    {
        $request = $this->request->getJSON();

        $email = $request->email;
        $senha = $request->senha;

        $usuario = $this->model->where('email', $email)->first();

        if (!password_verify($senha, $usuario['senha'])) {
            return $this->respond(
                [
                    'mensagem' => 'Usuário e/ou Senha inválidos',
                ],
                404
            );
        }

        return $this->getJWTForUser($usuario['email']);
    }

    // /**
    //  * Altera dados do usuário 
    //  */
    // public function update($id = null)
    // {
    //     $data = $this->request->getJSON();

    //     $client = $this->model->update($id, $data);

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond($client, 200);
    // }



    // /**
    //  * deleta usuário
    //  */
    // public function delete($id = null)
    // {

    //     $client = $this->model->delete($id);

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond($client, 200);
    // }
    

    /**
     * Cadastra novo usuario
     */
    public function store()
    {
        $input = $this->request->getJSON();

        if (empty($input)) {
            return $this
                ->respond(
                    '',
                    ResponseInterface::HTTP_BAD_REQUEST
                );
        }

        $data = [
            'nome' => $input->nome,
            'email' => $input->email,
            'senha' => password_hash($input->senha, PASSWORD_DEFAULT),
        ];

        $this->model->insert($data);

        return $this
            ->getJWTForUser(
                $input->email,
                ResponseInterface::HTTP_CREATED
            );
    }
    

    private function getJWTForUser(string $emailAddress, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {

            $user = $this->model->where('email', $emailAddress)->first();
            unset($user->password);

            helper('jwt');

            return $this
                ->respond(
                    [
                        'message' => 'User authenticated successfully',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ],
                    201
                );
        } catch (Exception $exception) {
            return $this
                ->respond(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
}
