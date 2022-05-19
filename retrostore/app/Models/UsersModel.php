<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'nome'];

    public function getUsuario($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insertUsuario($data)
    {            
        return $this->insert($data);
    }

    public function updateUsuario($id,$data)
    {
        return $this->update($id, $data);
    }

    public function removeUsuario($id = null){
        if ($id !== null){
            $this->delete($id);
        }
    }

}

?>