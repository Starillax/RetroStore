<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriasModel extends Model {

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome'];

    public function getCategoria($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insertCategoria($data)
    {            
        return $this->insert($data);
    }

    public function updateCategoria($id,$data)
    {
        return $this->update($id, $data);
    }

    public function removeCategoria($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }

}

?>