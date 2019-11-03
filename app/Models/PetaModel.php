<?php 

namespace App\Models;
use CodeIgniter\Model;

class PetaModel extends Model
{
    protected $table = 'location'; 

    public function getListing($name = false)
    {
        if ($name === false) {
            return $this->findAll();
        }
        return $this->asArray()
        ->where(['name' => $name])
        ->first();
    }

}