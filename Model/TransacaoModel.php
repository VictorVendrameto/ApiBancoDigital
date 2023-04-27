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

    public function getAllRows()
    {
        $dao = new TransacaoDAO();

        $this->rows = $dao->select();
    }

    public function delete($id)
    {
        $dao = new TransacaoDAO();

        $dao->delete($id);
    }

    public function getById($id)
    {
        $dao = new TransacaoDAO();

        $this->rows = $dao->selectById($id);
    }
}