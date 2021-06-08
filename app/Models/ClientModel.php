<?php namespace App\Models;
use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'Client';

    protected $allowedFields = ['FIO', 'pictureUrl'];

    public function getForSearch($search = ''){
        if ($search != NULL){
            return $this->select('*')->like('FIO', $search);
        }
        else{
            return $this->select('*');
        }
    }

    public function getRatingByName($name = null)
    {
        if (!isset($name)) {
            return $this->findAll();
        }

        return $this->where(['FIO' => $name])->first();
    }
}

