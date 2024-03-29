<?php

namespace ApiBancoDigital\DAO;
use ApiBancoDigital\Model\ContaModel;
use \PDO;

class ContaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM conta";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function update(ContaModel $m) : bool
    {
        $sql = "UPDATE conta SET numero=?, tipo=?, saldo=?, limite=?, senha=?, 
            data_abertura=?, id_correntista=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->saldo);
        $stmt->bindValue(4, $m->limite);
        $stmt->bindValue(5, $m->senha);
        $stmt->bindValue(6, $m->data_abertura);
        $stmt->bindValue(7, $m->id_correntista);
        $stmt->bindValue(8, $m->id);

        return $stmt->execute();
    }

    public function insert(ContaModel $m) : bool
    {
        $sql = "INSERT INTO conta (numero, tipo, saldo, limite, senha, 
            data_abertura, id_correntista) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->saldo);
        $stmt->bindValue(4, $m->limite);
        $stmt->bindValue(5, $m->senha);
        $stmt->bindValue(6, $m->data_abertura);
        $stmt->bindValue(7, $m->id_correntista);

        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM conta WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }
    
    public function selectContasById(int $id)
    {
        $sql = "SELECT * FROM conta WHERE id = ?";   

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
}