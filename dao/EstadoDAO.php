<?php
require_once __DIR__ . '/../conexao.php';

class EstadoDAO
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = getConexao();
    }

    public static function getInstance()
    {
        if (self::$instance === null) self::$instance = new EstadoDAO();
        return self::$instance;
    }

    function inserir($d)
    {
        $stmt = $this->conn->prepare("INSERT INTO estado (nome, sigla) VALUES (:nome, :sigla)");
        $stmt->execute([':nome' => $d['nome'], ':sigla' => $d['sigla']]);
    }

    function alterar($d)
    {
        $stmt = $this->conn->prepare("UPDATE estado SET nome = :nome, sigla = :sigla WHERE id = :id");
        $stmt->execute([':nome' => $d['nome'], ':sigla' => $d['sigla'], ':id' => $d['id']]);
    }

    function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM estado WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function listar()
    {
        return $this->conn->query("SELECT * FROM estado")->fetchAll(PDO::FETCH_ASSOC);
    }

    function obter($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM estado WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
}