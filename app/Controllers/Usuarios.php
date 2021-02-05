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
     * Cadastra novo usuario
     */
    public function store()
    {
        $request = $this->request->getJSON();
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => password_hash($request->senha, PASSWORD_DEFAULT),
        ];

        $result = $this->model->insert($data);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }

    
}
