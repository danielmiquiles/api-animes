<?php 
namespace App\Models;
use CodeIgniter\Model;

class Episodios extends Model
{
    protected $table = 'episodio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
}