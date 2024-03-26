<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    include("conecta.php");

    if(isset($_POST["inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO cadastro (nome, email, senha) VALUES (:nome, :email, :senha)");
        $comando->bindParam(':nome', $nome);
        $comando->bindParam(':email', $email);
        $comando->bindParam(':senha', $senha);
        $resultado = $comando->execute();

        if ($resultado) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            header("location: index.html");
            exit();
        } else {
            echo "Erro ao inserir dados.";
        }
    }
?>
