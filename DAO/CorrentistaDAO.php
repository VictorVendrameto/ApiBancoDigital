<?php

namespace ApiBancoDigital\DAO;
use ApiBancoDigital\Model\ContaModel;
use \PDO;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select() : array
    {
        $sql = "SELECT * FROM correntista";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "ApiBancoDigital\Model\CorrentistaModel");
    }

    public function selectByCpfSenha(CorrentistaModel $model)
    {
        $sql = "SELECT * FROM correntista WHERE cpf = ? AND senha = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->cpf);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        return $stmt->fetchObject("ApiBancoDigital\Model\CorrentistaModel");
    }

    public function update()
    {

    }
    public function insert(CorrentistaModel $m) : bool
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, email, senha, 
            data_cad) VALUES (?, ?, ?, ?, sha1(?), ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->email);
        $stmt->bindValue(5, $m->senha);
        $stmt->bindValue(6, $m->data_cad);

        $stmt->execute();
        return $this->conexao->lastInsertId();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();

    }
}