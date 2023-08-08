<?php

namespace ApiBancoDigital\DAO;
use ApiBancoDigital\Model\CorrentistaModel;
use \PDO;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(CorrentistaModel $m) : CorrentistaModel
    {
        return ($m->id == null) ? $this->insert($m) : $this->update($m);
    }

    public function select() : array
    {
        $sql = "SELECT * FROM correntista";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "ApiBancoDigital\Model\CorrentistaModel");
    }

    public function selectByCpfAndSenha(CorrentistaModel $model)
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
    public function insert(CorrentistaModel $model)
    {
        $sql = "INSERT INTO correntista (nome, cpf, data_nasc, email, senha, 
            data_cad) VALUES (?, ?, ?, ?, sha1(?), ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->senha);
        $stmt->bindValue(6, $model->data_cad);

        $stmt->execute();
        $model->id = $this->conexao->lastInsertId();
        return $model;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();

    }
}