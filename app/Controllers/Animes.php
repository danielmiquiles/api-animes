<?php

namespace App\Controllers;

use App\Models\AnimesModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;


class Animes extends BaseController
{
    // public function logar()
    // {
    //     $model = new ClientModel();
    //     return $this->getResponse(
    //         [
    //             'message' => 'Clients retrieved successfully',
    //             'clients' => $model->findAll()
    //         ]
    //     );
    // }

    /**
     * Create a new Client
     */
    // public function store()
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[client.email]',
    //         'retainer_fee' => 'required|max_length[255]'
    //     ];

    //     $input = $this->getRequestInput($this->request);

    //     if (!$this->validateRequest($input, $rules)) {
    //         return $this
    //             ->getResponse(
    //                 $this->validator->getErrors(),
    //                 ResponseInterface::HTTP_BAD_REQUEST
    //             );
    //     }

    //     $clientEmail = $input['email'];

    //     $model = new ClientModel();
    //     $model->save($input);


    //     $client = $model->where('email', $clientEmail)->first();

    //     return $this->getResponse(
    //         [
    //             'message' => 'Client added successfully',
    //             'client' => $client
    //         ]
    //     );
    // }

    /**
     * Get a single client by ID
     */
    // public function show($id)
    // {
    //     try {

    //         $model = new ClientModel();
    //         $client = $model->findClientById($id);

    //         return $this->getResponse(
    //             [
    //                 'message' => 'Client retrieved successfully',
    //                 'client' => $client
    //             ]
    //         );
    //     } catch (Exception $e) {
    //         return $this->getResponse(
    //             [
    //                 'message' => 'Could not find client for specified ID'
    //             ],
    //             ResponseInterface::HTTP_NOT_FOUND
    //         );
    //     }
    // }
    //     public function index()
    //     {
    //         $model = new ClientModel();
    //         return $this->getResponse(
    //             [
    //                 'message' => 'Clients retrieved successfully',
    //                 'clients' => $model->findAll()
    //             ]
    //         );
    //     }

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

    //     /**
    //      * Get a single client by ID
    //      */
    //     public function show($id)
    //     {
    //         try {

    //             $model = new ClientModel();
    //             $client = $model->findClientById($id);

    //             return $this->getResponse(
    //                 [
    //                     'message' => 'Client retrieved successfully',
    //                     'client' => $client
    //                 ]
    //             );

    //         } catch (Exception $e) {
    //             return $this->getResponse(
    //                 [
    //                     'message' => 'Could not find client for specified ID'
    //                 ],
    //                 ResponseInterface::HTTP_NOT_FOUND
    //             );
    //         }
    //     }

    //--------------------------------------------------------------------

}
