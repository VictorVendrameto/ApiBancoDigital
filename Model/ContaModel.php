<?php

namespace ApiBancoDigital\Model;

use ApiBancoDigital\DAO\ContaDAO;

class ContaModel extends Model
{
    public $id, $numero, $tipo, $saldo, $limite, $senha, $data_abertura, $id_correntista;

    public function save()
    {
        $dao = new ContaDAO();

        if($this->id == null)
        {
           (new ContaDAO())->insert($this);
        }
    }

    public function getAllRows()
    {
        $this->rows = (new ContaDAO())->select();
    }

    public function delete()
    {
        (new ContaDAO())->delete($this->id);
    }
}