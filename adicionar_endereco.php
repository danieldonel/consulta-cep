<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco_de_dados = "consulta_cep_db";

$conexao = new mysqli($servidor, $usuario, $senha, $banco_de_dados);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

include("conecta.php");

if (!isset($_SESSION["id"])) {
    die("Usuário não autenticado.");
}

$logradouro = $_POST['logradouro'] ?? '';
$complemento = $_POST['complemento'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$cidade = $_POST['localidade'] ?? '';
$uf = $_POST['uf'] ?? '';

$id = $_SESSION["id"];

$sql_verifica = "SELECT id FROM enderecos WHERE id = '$id' AND logradouro = '$logradouro' AND complemento = '$complemento' AND bairro = '$bairro' AND cidade = '$cidade' AND uf = '$uf'";
$resultado_verifica = $conexao->query($sql_verifica);

if ($resultado_verifica->num_rows > 0) {
    echo "Endereço já cadastrado para este usuário.";
} else {
    $sql_inserir = "INSERT INTO enderecos (id, logradouro, complemento, bairro, cidade, uf) VALUES ('$id', '$logradouro', '$complemento', '$bairro', '$cidade', '$uf')";
    if ($conexao->query($sql_inserir) === TRUE) {
        echo "Endereço adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar endereço: " . $conexao->error;
    }
}
?>
