<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="item-menu">
                <a href="consulta.php">
                    <span class="icon"><i class="bi bi-search"></i></i></span>
                    <span class="txt-link">Consulta</span>
                </a>
            </li>

            <li class="item-menu ativo">
                <a href="#">
                    <span class="icon"><i class="bi bi-columns-gap"></i></span>
                    <span class="txt-link">Histórico</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="conta.html">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="txt-link">Conta</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="quadrado">
    <table class="tabela">
        <tr>
            <th>Logradouro</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
        </tr>
        <?php
        session_start();

        if (!isset($_SESSION["id"])) {
            die("Usuário não autenticado.");
        }

        include("conecta.php");

        $id = $_SESSION["id"];

        $comando = $pdo->prepare("SELECT * FROM enderecos WHERE id = :id");
        $comando->bindParam(':id', $id);
        $comando->execute();

        $enderecos = $comando->fetchAll();

        foreach ($enderecos as $endereco) {
            $logradouro = $endereco["logradouro"];
            $complemento = $endereco["complemento"];
            $bairro = $endereco["bairro"];
            $cidade = $endereco["cidade"];
            $uf = $endereco["uf"];
            echo "
                <tr>
                    <td>$logradouro</td>
                    <td>$complemento</td>
                    <td>$bairro</td>
                    <td>$cidade</td>
                    <td>$uf</td>
                </tr>";
        }
        ?>
    </table>
</div>

    <script src="js/script.js"></script>

</body>
</html>