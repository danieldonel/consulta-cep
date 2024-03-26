<?php
session_start();
$_SESSION["logado"] = false;
$email = $_POST["email"];
$senha = $_POST["senha"];
include("conecta.php");

if (!empty($email) && !empty($senha)) {
    $comando = $pdo->prepare("SELECT id, nome FROM cadastro WHERE email=:email AND senha=:senha");
    $comando->bindParam(":email", $email);
    $comando->bindParam(":senha", $senha);
    $resultado = $comando->execute();
    $linhas = $comando->fetchAll();

    if (count($linhas) > 0) {
        $id = $linhas[0]["id"];
        $nome = $linhas[0]["nome"];
        $_SESSION["logado"] = true;
        $_SESSION["nome"] = $nome;
        $_SESSION["id"] = $id;
        header("Location: consulta.php");
        exit;
    } else {
        echo "E-mail ou senha incorretos.";
        exit;
    }
} else {
    echo "E-mail e senha são obrigatórios.";
    exit;
}
?>
