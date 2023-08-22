<?php

namespace ApiBancoDigital\Model;

use ApiBancoDigital\DAO\TransacaoDAO;

class TransacaoModel extends Model
{
    public $id, $tipo, $chave, $id_conta;

    public function save()
    {
        $dao = new TransacaoDAO();
        if($this->id == null)
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows(int $id_conta)
    {
        $dao = new TransacaoDAO();

        $this->rows = $dao->select($id_conta);
    }
    
    public function getById($id)
    {
        $dao = new TransacaoDAO();

        $this->rows = $dao->selectById($id);
    }
}