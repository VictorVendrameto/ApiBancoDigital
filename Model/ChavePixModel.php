<?php

namespace ApiBancoDigital\Model;

use ApiBancoDigital\Controller\ChavePixController;
use ApiBancoDigital\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $id, $tipo, $chave, $id_conta;

    public function save()
    {
        $dao = new ChavePixDAO();
        if($this->id == null)
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new ChavePixDAO();

        $this->rows = $dao->select();
    }

    public function delete($id)
    {
        $dao = new ChavePixDAO();

        $dao->delete($id);
    }

    public function getById($id)
    {
        $dao = new ChavePixDAO();

        $this->rows = $dao->selectById($id);
    }
}