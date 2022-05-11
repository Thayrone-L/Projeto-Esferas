<?php

require_once __DIR__ . '/conecta.php';

// atualiza o funcionário com o id selecionado no banco de dados

$id = isset($_GET["id"]) ? $_GET["id"] : "";
$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
$sobrenome = isset($_GET["sobrenome"]) ? $_GET["sobrenome"] : "";
$cpf = isset($_GET["cpf"]) ? $_GET["cpf"] : "";
$email = isset($_GET["email"]) ? $_GET["email"] : "";
$telefone = isset($_GET["telefone"]) ? $_GET["telefone"] : "";
$cep = isset($_GET["cep"]) ? $_GET["cep"] : "";
$endereco = isset($_GET["endereco"]) ? $_GET["endereco"] : "";
$numero = isset($_GET["numero"]) ? $_GET["numero"] : "";
$complemento = isset($_GET["complemento"]) ? $_GET["complemento"] : "NULL";
$bairro = isset($_GET["bairro"]) ? $_GET["bairro"] : "";
$cidade = isset($_GET["cidade"]) ? $_GET["cidade"] : "";
$estado = isset($_GET["estado"]) ? $_GET["estado"] : "";

$update = "UPDATE `contatos` SET `nome` = '$nome ', `sobrenome`= '$sobrenome', `cpf`= '$cpf', `email` = '$email', `telefone`= '$telefone', `cep`= '$cep', `endereco` = '$endereco', `numero` = '$numero', `complemento` = '$complemento', `bairro` = '$bairro', `cidade` = '$cidade', `estado` = '$estado' WHERE `id` = '$id';";


    if (!$mysqli->query($update)) {
        echo "Erro na atualização: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
        echo "Atualizado com sucesso!";
    }
