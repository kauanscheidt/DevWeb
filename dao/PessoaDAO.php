<?php
require_once __DIR__ . '/../conexao.php';

class PessoaDAO
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = getConexao();
    }

    public static function getInstance()
    {
        if (self::$instance === null) self::$instance = new PessoaDAO();
        return self::$instance;
    }

    function inserir($d)
    {
        $stmt = $this->conn->prepare("INSERT INTO pessoa (nome, cidade_id, peso, altura) VALUES (:nome, :cidade_id, :peso, :altura)");
        $stmt->execute([':nome' => $d['nome'], ':cidade_id' => $d['cidade_id'], ':peso' => $d['peso'], ':altura' => $d['altura']]);
    }

    function alterar($d)
    {
        $stmt = $this->conn->prepare("UPDATE pessoa SET nome=:nome, cidade_id=:cidade_id, peso=:peso, altura=:altura WHERE id=:id");
        $stmt->execute([':nome' => $d['nome'], ':cidade_id' => $d['cidade_id'], ':peso' => $d['peso'], ':altura' => $d['altura'], ':id' => $d['id']]);
    }

    function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM pessoa WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function listar()
    {
        return $this->conn->query("
            SELECT p.*, c.nome AS cidade_nome
            FROM pessoa p JOIN cidade c ON p.cidade_id = c.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    function obter($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
}