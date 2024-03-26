<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "consulta_cep_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
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

$sql_check = "SELECT id FROM enderecos WHERE id = '$id' AND logradouro = '$logradouro' AND complemento = '$complemento' AND bairro = '$bairro' AND cidade = '$cidade' AND uf = '$uf'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Endereço já cadastrado para este usuário.";
} else {
    $sql_insert = "INSERT INTO enderecos (id, logradouro, complemento, bairro, cidade, uf) VALUES ('$id', '$logradouro', '$complemento', '$bairro', '$cidade', '$uf')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Endereço adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar endereço: " . $conn->error;
    }
}