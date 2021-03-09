<?php 
namespace App\Models;
use CodeIgniter\Model;

class Episodios extends Model
{
    protected $table = 'episodio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['anime_id', 'nome', 'assistido','numero'];
}