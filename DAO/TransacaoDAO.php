<?php

namespace ApiBancoDigital\DAO;
use ApiBancoDigital\Model\TransacaoModel;
use \PDO;

class TransacaoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select(int $id_conta) : array
    {
        $sql = "SELECT * FROM transacao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "ApiBancoDigital\Model\TransacaoModel");
    }

    public function selectByCpfAndSenha(TransacaoModel $model)
    {
        $sql = "SELECT * FROM transacao WHERE cpf = ? AND senha = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->cpf);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        return $stmt->fetchObject("ApiBancoDigital\Model\TransacaoModel");
    }

    public function insert(TransacaoModel $model)
    {
        $sql = "INSERT INTO transacao (nome, cpf, data_nasc, email, senha, 
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
}