<?php
require_once 'dao/LivroDAO.php';
define("DESTINO", "livro_list.php");

$acao = $_REQUEST['acao'] ?? '';
$dao = LivroDAO::getInstance();

switch ($acao) {
    case 'Salvar':
        $dao->inserir($_POST);
        header("Location: " . DESTINO);
        break;
    case 'Alterar':
        $dao->alterar($_POST);
        header("Location: " . DESTINO);
        break;
    case 'excluir':
        $dao->excluir($_GET['id']);
        header("Location: " . DESTINO);
        break;
}