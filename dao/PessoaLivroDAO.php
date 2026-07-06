<?php
require_once __DIR__ . '/../conexao.php';

class PessoaLivroDAO
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = getConexao();
    }

    public static function getInstance()
    {
        if (self::$instance === null) self::$instance = new PessoaLivroDAO();
        return self::$instance;
    }

    function inserir($d)
    {
        $stmt = $this->conn->prepare("INSERT INTO pessoa_livro (pessoa_id, livro_id, data_emprestimo, prazo) VALUES (:pessoa_id, :livro_id, :data_emprestimo, :prazo)");
        $stmt->execute([':pessoa_id' => $d['pessoa_id'], ':livro_id' => $d['livro_id'], ':data_emprestimo' => $d['data_emprestimo'], ':prazo' => $d['prazo']]);
    }

    function alterar($d)
    {
        $stmt = $this->conn->prepare("UPDATE pessoa_livro SET pessoa_id=:pessoa_id, livro_id=:livro_id, data_emprestimo=:data_emprestimo, prazo=:prazo WHERE id=:id");
        $stmt->execute([':pessoa_id' => $d['pessoa_id'], ':livro_id' => $d['livro_id'], ':data_emprestimo' => $d['data_emprestimo'], ':prazo' => $d['prazo'], ':id' => $d['id']]);
    }

    function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM pessoa_livro WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function listar()
    {
        return $this->conn->query("
            SELECT pl.*, p.nome AS pessoa_nome, l.nome AS livro_nome
            FROM pessoa_livro pl
            JOIN pessoa p ON pl.pessoa_id = p.id
            JOIN livro l ON pl.livro_id = l.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    function obter($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM pessoa_livro WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }
}