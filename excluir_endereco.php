<?php
session_start();

include("conecta.php");

if (!isset($_SESSION["id"])) {
    die("Usuário não autenticado.");
}

$id = $_GET["id"];
$logradouro = $_GET["logradouro"];
$cidade = $_GET["cidade"];

$comando = $pdo->prepare("DELETE FROM enderecos WHERE id = :id AND logradouro = :logradouro AND cidade = :cidade");
$comando->bindParam(':id', $id);
$comando->bindParam(':logradouro', $logradouro);
$comando->bindParam(':cidade', $cidade);
$comando->execute();


?>