<?php
function getConexao()
{
    static $conn = null;
    if ($conn === null) {
        $conn = new PDO('sqlite:' . __DIR__ . '/banco.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("PRAGMA foreign_keys = ON;");

        $conn->exec("CREATE TABLE IF NOT EXISTS estado (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            sigla TEXT NOT NULL
        );");

        $conn->exec("CREATE TABLE IF NOT EXISTS cidade (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            estado_id INTEGER NOT NULL,
            FOREIGN KEY (estado_id) REFERENCES estado(id)
        );");

        $conn->exec("CREATE TABLE IF NOT EXISTS pessoa (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            cidade_id INTEGER NOT NULL,
            peso REAL,
            altura REAL,
            FOREIGN KEY (cidade_id) REFERENCES cidade(id)
        );");

        $conn->exec("CREATE TABLE IF NOT EXISTS livro (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            autor TEXT NOT NULL,
            genero TEXT NOT NULL,
            descricao TEXT
        );");

        $conn->exec("CREATE TABLE IF NOT EXISTS pessoa_livro (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            pessoa_id INTEGER NOT NULL,
            livro_id INTEGER NOT NULL,
            data_emprestimo TEXT,
            prazo TEXT,
            FOREIGN KEY (pessoa_id) REFERENCES pessoa(id),
            FOREIGN KEY (livro_id) REFERENCES livro(id)
        );");
    }
    return $conn;
}