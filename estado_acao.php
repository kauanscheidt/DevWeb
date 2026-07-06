<?php
require_once 'dao/EstadoDAO.php';
define("DESTINO", "estado_list.php");

$acao = $_REQUEST['acao'] ?? '';
$dao = EstadoDAO::getInstance();

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