<?php

namespace ApiBancoDigital\Model;

use ApiBancoDigital\DAO\CorrentistaDAO;

class CorrentistaModel extends Model
{
    public $id, $tipo, $chave, $id_conta;

    public function save()
    {
        $dao = new CorrentistaDAO();
        if($this->id == null)
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new CorrentistaDAO();

        $this->rows = $dao->select();
    }

    public function delete($id)
    {
        $dao = new CorrentistaDAO();

        $dao->delete($id);
    }

    public function getById($id)
    {
        $dao = new CorrentistaDAO();

        $this->rows = $dao->selectById($id);
    }
}