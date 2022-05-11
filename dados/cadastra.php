<?php

require_once __DIR__ . '/conecta.php';

// consulta pelo cpf se já existe um cadastro no banco de dados caso negativo, cadastra o funcionário no banco

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

$insere = "INSERT INTO `contatos` (`id`, `nome`, `sobrenome`, `cpf`, `email`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES (NULL, '$nome', '$sobrenome', '$cpf', '$email', '$telefone', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

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
