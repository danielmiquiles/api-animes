<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\Usuarios;
use Exception;

class Animes extends ResourceController
{

    use ResponseTrait;
    protected $modelName = '\App\Models\Animes';


    /**
     *  Retorna todos os animes
     */
    public function index()
    {

        return $this->respond(
            [
                'animes' => $this->model->findAll()
            ],
            200
        );
    }

    /**
     * Create a new Client
     */
    public function store()
    {
        $request = $this->request->getJSON();
        $data = [
            'nome' => $request->nome,
            'ano' => $request->ano,
            'imagem' => $request->imagem,
        ];

        $result = $this->model->insert($data);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }

    /**
     * Pega anime pelo id
     */
    public function find($id)
    {
        $client = $this->model->find($id);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 201);
    }

    /**
     * Pega anime pelo id 
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
     * Pega anime pelo id 
     */
    public function delete($id = null)
    {

        $client = $this->model->delete($id);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 200);
    }



    /**
     * Pega episódios de um anime espécifico
     */
    public function getEpisodios($id = null)
    {
        $client = $this->model->where('episodio_id',$id)->findAll();

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }
}
