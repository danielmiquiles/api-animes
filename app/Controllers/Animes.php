<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
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
                'clients' => $this->model->findAll()
            ],
            200
        );
    }


    /**
     * Create a new Client
     */
    public function store()
    {        
        print_r($this->request->getJSON());
        $request = $this->request->getJSON();
        print_r($request->nome);
        return $this->respondCreated();
    }

    /**
     * Pega anime pelo id
     */
    public function find($id)
    {
        try {

            $client = $this->model->find($id);

            return $this->respond(
                [
                    'client' => $client
                ],
                200
            );
        } catch (Exception $e) {

            return $this->respond('', 404);
        }
    }


    //     /**
    //      * Create a new Client
    //      */
    //     public function store()
    //     {
    //         $rules = [
    //             'name' => 'required',
    //             'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[client.email]',
    //             'retainer_fee' => 'required|max_length[255]'
    //         ];

    //  $input = $this->getRequestInput($this->request);

    //         if (!$this->validateRequest($input, $rules)) {
    //             return $this
    //                 ->getResponse(
    //                     $this->validator->getErrors(),
    //                     ResponseInterface::HTTP_BAD_REQUEST
    //                 );
    //         }

    //         $clientEmail = $input['email'];

    //         $model = new ClientModel();
    //         $model->save($input);


    //         $client = $model->where('email', $clientEmail)->first();

    //         return $this->getResponse(
    //             [
    //                 'message' => 'Client added successfully',
    //                 'client' => $client
    //             ]
    //         );
    //     }


    //--------------------------------------------------------------------

}
