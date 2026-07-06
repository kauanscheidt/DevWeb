<?php
require_once __DIR__ . '/../conexao.php';

class CidadeDAO
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = getConexao();
    }

    public static function getInstance()
    {
        if (self::$instance === null) self::$instance = new CidadeDAO();
        return self::$instance;
    }

    function inserir($d)
    {
        $stmt = $this->conn->prepare("INSERT INTO cidade (nome, estado_id) VALUES (:nome, :estado_id)");
        $stmt->execute([':nome' => $d['nome'], ':estado_id' => $d['estado_id']]);
    }

    function alterar($d)
    {
        $stmt = $this->conn->prepare("UPDATE cidade SET nome = :nome, estado_id = :estado_id WHERE id = :id");
        $stmt->execute([':nome' => $d['nome'], ':estado_id' => $d['estado_id'], ':id' => $d['id']]);
    }

    function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cidade WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function listar()
    {
        return $this->conn->query("
            SELECT c.*, e.nome AS estado_nome
            FROM cidade c JOIN estado e ON c.estado_id = e.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    function obter($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM cidade WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
}