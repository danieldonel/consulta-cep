<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    include("conecta.php");

    if(isset($_POST["inserir"]))
    {
        $verifica_email = $pdo->prepare("SELECT * FROM cadastro WHERE email = :email");
        $verifica_email->bindParam(':email', $email);
        $verifica_email->execute();

        if ($verifica_email->rowCount() > 0) {
            echo '<script>alert("E-mail já cadastrado"); window.location.href = "cadastro.html";</script>';
            exit();
        }

        $comando = $pdo->prepare("INSERT INTO cadastro (nome, email, senha) VALUES (:nome, :email, :senha)");
        $comando->bindParam(':nome', $nome);
        $comando->bindParam(':email', $email);
        $comando->bindParam(':senha', $senha);
        $resultado = $comando->execute();

        if ($resultado) {
            echo '<script>alert("Cadastro realizado com sucesso"); window.location.href = "index.html";</script>';
            exit();
        } else {
            echo "Erro ao inserir dados.";
        }
    }
?>