<?php

namespace ApiBancoDigital\DAO;

use ApiBancoDigital\Model\ChavePixModel;
use ApiBancoDigital\Model\ContaModel;
use \PDO;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(ChavePixModel $model) : ?ChavePixModel
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function select(int $id_correntista)
    {
        $sql = "SELECT cp.*
                FROM chave_pix cp
                JOIN conta c ON (c.id_conta = cp.id_conta)
                WHERE c.id_correntista = ? ";
    }

    public function selectById()
    {

    }

    public function update()
    {

    }

    public function insert()
    {

    }

    public function delete(ChavePixModel $model) : bool
    {
        $sql =  "DELETE FROM chave_pix WHERE id=? AND id_conta=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(1, $model->id_conta);

        return $stmt->execute();
    }
}