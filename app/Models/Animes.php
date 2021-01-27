<?php

namespace App\Models;

use CodeIgniter\Model;

class Animes extends Model
{
    protected $table = 'anime';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'ano', 'imagem', 'updated_at'];


    public function getAnimes(){

        $query = "SELECT * FROM animes";

        $query = $this->db->query($query);

        return $query->getResultArray();

       }
}

