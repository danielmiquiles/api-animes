<?php 
namespace App\Models;
use CodeIgniter\Model;

class EpisodiosModel extends Model
{
    protected $table = 'episodios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
}