<?php

namespace ApiBancoDigital\Model;

use ApiBancoDigital\Controller\ChavePixController;
use ApiBancoDigital\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $id, $id_conta, $chave, $id_conta;

    public function save() : ?ChavePixModel
    {
        return (new ChavePixDAO())->save($this);
    }

    public function getAllRows(int $id_correntista) : array
    {
        return (new ChavePixDAO())->select($this);
    }

    public function remove() : bool
    {
        return (new ChavePixDAO())->delete($this);
    }
}