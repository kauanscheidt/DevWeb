<?php
require_once __DIR__ . '/../conexao.php';

class LivroDAO
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = getConexao();
    }

    public static function getInstance()
    {
        if (self::$instance === null) self::$instance = new LivroDAO();
        return self::$instance;
    }

    function inserir($d)
    {
        $stmt = $this->conn->prepare("INSERT INTO livro (nome, autor, genero, descricao) VALUES (:nome, :autor, :genero, :descricao)");
        $stmt->execute([':nome' => $d['nome'], ':autor' => $d['autor'], ':genero' => $d['genero'], ':descricao' => $d['descricao']]);
    }

    function alterar($d)
    {
        $stmt = $this->conn->prepare("UPDATE livro SET nome=:nome, autor=:autor, genero=:genero, descricao=:descricao WHERE id=:id");
        $stmt->execute([':nome' => $d['nome'], ':autor' => $d['autor'], ':genero' => $d['genero'], ':descricao' => $d['descricao'], ':id' => $d['id']]);
    }

    function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM livro WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function listar()
    {
        return $this->conn->query("SELECT * FROM livro")->fetchAll(PDO::FETCH_ASSOC);
    }

    function obter($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM livro WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
}