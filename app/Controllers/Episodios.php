<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Episodios extends ResourceController
{

    use ResponseTrait;
    protected $modelName = '\App\Models\Episodios';

    /**
     * Insere um novo episodio
     */
    public function store($anime_id = null)
    {
        $request = $this->request->getJSON();

        $data = [
            'anime_id' => $anime_id,
            'nome' => $request->nome,
            'numero' => $request->numero,
        ];

        $result = $this->model->insert($data);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }

    /**
     * Altera anime pelo id 
     */
    public function update($anime_id = null, $id = null)
    {
        $data = $this->request->getJSON();
        
        $client = $this->model->where('anime_id', $anime_id)->update($id, $data);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 200);
    }

    /**
     * Pega anime pelo id 
     */
    public function delete($anime_id = null, $id = null)
    {

        $client = $this->model->where('anime_id', $anime_id)->delete($id);

        if (!$client) {
            return $this->respond('', 404);
        }

        return $this->respond($client, 200);
    }



    /**
     * Pega todos os episódios de um anime específico
     */
    public function getEpisodios($anime_id = null)
    {
        $episodios = $this->model->where('anime_id',$anime_id)->findAll();

        if (!$episodios) {
            return $this->respond('', 404);
        }

        return $this->respond($episodios, 200);
    }


    /**
     * Pega episódios de um anime específico
     */
    public function getEpisodiosById($anime_id = null, $id = null)
    {
        $episodios = $this->model->where('anime_id', $anime_id)->where('id', $id)->findAll();

        if (!$episodios) {
            return $this->respond('', 404);
        }

        return $this->respond($episodios, 200);
    }
}
