<?php

namespace ApiBancoDigital\DAO;

use ApiBancoDigital\Model\ChavePixModel;
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
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_correntista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function update(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "UPDATE chave_pix SET id_conta=?, tipo=?, chave=? WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_conta);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->chave);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
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