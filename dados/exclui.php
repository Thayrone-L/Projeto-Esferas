<?php

require_once __DIR__ . '/conecta.php';

$id = isset($_GET["id"]) ? $_GET["id"] : "";


$deleta = "DELETE FROM `contatos` WHERE `contatos`.`id` = $id ";




if (!$mysqli->query($deleta)) {
    echo "Erro na exclusão: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    echo "Excluído com sucesso!";
}
