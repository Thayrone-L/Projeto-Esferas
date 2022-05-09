<?php

require_once __DIR__ . '/conecta.php';

$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
$sobrenome = isset($_GET["sobrenome"]) ? $_GET["sobrenome"] : "";
$cpf = isset($_GET["cpf"]) ? $_GET["cpf"] : "";
$email = isset($_GET["email"]) ? $_GET["email"] : "";
$email2 = isset($_GET["email2"]) ? $_GET["email2"] : "NULL";
$email3 = isset($_GET["email3"]) ? $_GET["email3"] : "NULL";
$telefone = isset($_GET["telefone"]) ? $_GET["telefone"] : "";
$telefone2 = isset($_GET["telefone2"]) ? $_GET["telefone2"] : "NULL";
$telefone3 = isset($_GET["telefone3"]) ? $_GET["telefone3"] : "NULL";
$cep = isset($_GET["cep"]) ? $_GET["cep"] : "";
$endereco = isset($_GET["endereco"]) ? $_GET["endereco"] : "";
$numero = isset($_GET["numero"]) ? $_GET["numero"] : "";
$complemento = isset($_GET["complemento"]) ? $_GET["complemento"] : "NULL";
$bairro = isset($_GET["bairro"]) ? $_GET["bairro"] : "";
$cidade = isset($_GET["cidade"]) ? $_GET["cidade"] : "";
$estado = isset($_GET["estado"]) ? $_GET["estado"] : "";

$insere = "INSERT INTO `contatos` (`id`, `nome`, `sobrenome`, `cpf`, `email`, `email2`, `email3`, `telefone`, `telefone2`, `telefone3`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES (NULL, '$nome', '$sobrenome', '$cpf', '$email', '$email2', '$email3', '$telefone', '$telefone2', '$telefone3', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

$consulta = "SELECT * FROM `contatos` WHERE cpf = '$cpf';";
if (!($stmt = $mysqli->prepare($consulta))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
$res = $stmt->get_result();
$row = $res->fetch_assoc();
if ($row == 0) {

    if (!$mysqli->query($insere)) {
        echo "Erro no cadastro: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
        echo "Cadastrado com sucesso!";
    }
} else {

    echo "Já existe um cadastro com esse CPF, verifique e tente novamente!";
}
