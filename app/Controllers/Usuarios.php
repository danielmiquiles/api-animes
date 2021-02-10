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
    public $logado = false;


    // private function getKey()
    // {

    //     return "my_application_secret";
    // }

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
    //  * Cadastra novo usuario
    //  */
    // public function store()
    // {
    //     $request = $this->request->getJSON();
    //     $data = [
    //         'nome' => $request->nome,
    //         'email' => $request->email,
    //         'senha' => password_hash($request->senha, PASSWORD_DEFAULT),
    //         // 'token' => hash('md5', rand(1000000,9999999).$request->nome.$request->email)
    //     ];

    //     $result = $this->model->insert($data);

    //     if (!$result) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond('', 201);
    // }


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

    /**
     * Authenticate Existing User
     * @return Response
     */
    // public function login()
    // {
    //     $rules = [
    //         'email' => 'required|min_length[6]|max_length[50]|valid_email',
    //         'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
    //     ];

    //     $errors = [
    //         'password' => [
    //             'validateUser' => 'Invalid login credentials provided'
    //         ]
    //     ];

    //     $input = $this->getRequestInput($this->request);


    //     if (!$this->validateRequest($input, $rules, $errors)) {
    //         return $this
    //             ->getResponse(
    //                 $this->validator->getErrors(),
    //                 ResponseInterface::HTTP_BAD_REQUEST
    //             );
    //     }
    //     return $this->getJWTForUser($input['email']);
    // }

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
