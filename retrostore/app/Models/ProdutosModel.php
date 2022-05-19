<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdutosModel extends Model {

    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'tipo', 'console', 'preco', 'categoria', 'quantidade'];

    public function getProduto($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insertProduto($data)
    {            
        return $this->insert($data);
    }

    public function updateProduto($id,$data)
    {
        return $this->update($id, $data);
    }

    public function removeProduto($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }

}

?>