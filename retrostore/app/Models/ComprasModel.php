<?php

namespace App\Models;
use CodeIgniter\Model;

class ComprasModel extends Model {

    protected $table = 'usuario_produto';
    protected $allowedFields = ['usuario', 'produto'];

    public function insertCompra($data)
    {            
        return $this->insert($data);
    }

    public function getComprasByUser($id){
        return $this->asArray()->where(['usuario' => $id])->findAll();
    }

}

?>