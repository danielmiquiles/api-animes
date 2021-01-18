<?php

namespace App\Models;
use CodeIgniter\Model;

class AnimesModel extends Model
{
    protected $table = 'animes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
}