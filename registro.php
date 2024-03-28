<!DOCTYPE html>
<html lang="pt-br">
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
                    <span class="txt-link">Resgistros</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="#" onclick="confirmarLogout()">
                    <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="txt-link">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="quadrado">
    <table class="tabela">
        <tr>
            <th><a href="?campo=logradouro&ordenacao=<?php echo isset($_GET['campo']) && $_GET['campo'] == 'logradouro' && isset($_GET['ordenacao']) && $_GET['ordenacao'] == 'ASC' ? 'DESC' : 'ASC'; ?>">Logradouro <?php echo ($_GET['campo'] ?? '') === 'logradouro' ? ($_GET['ordenacao'] ?? '') === 'ASC' ? '<i class="bi bi-caret-up-fill"></i>' : '<i class="bi bi-caret-down-fill"></i>' : ''; ?></a></th>
            <th><a href="?campo=complemento&ordenacao=<?php echo isset($_GET['campo']) && $_GET['campo'] == 'complemento' && isset($_GET['ordenacao']) && $_GET['ordenacao'] == 'ASC' ? 'DESC' : 'ASC'; ?>">Complemento <?php echo ($_GET['campo'] ?? '') === 'complemento' ? ($_GET['ordenacao'] ?? '') === 'ASC' ? '<i class="bi bi-caret-up-fill"></i>' : '<i class="bi bi-caret-down-fill"></i>' : ''; ?></a></th>
            <th><a href="?campo=bairro&ordenacao=<?php echo isset($_GET['campo']) && $_GET['campo'] == 'bairro' && isset($_GET['ordenacao']) && $_GET['ordenacao'] == 'ASC' ? 'DESC' : 'ASC'; ?>">Bairro <?php echo ($_GET['campo'] ?? '') === 'bairro' ? ($_GET['ordenacao'] ?? '') === 'ASC' ? '<i class="bi bi-caret-up-fill"></i>' : '<i class="bi bi-caret-down-fill"></i>' : ''; ?></a></th>
            <th><a href="?campo=cidade&ordenacao=<?php echo isset($_GET['campo']) && $_GET['campo'] == 'cidade' && isset($_GET['ordenacao']) && $_GET['ordenacao'] == 'ASC' ? 'DESC' : 'ASC'; ?>">Cidade <?php echo ($_GET['campo'] ?? '') === 'cidade' ? ($_GET['ordenacao'] ?? '') === 'ASC' ? '<i class="bi bi-caret-up-fill"></i>' : '<i class="bi bi-caret-down-fill"></i>' : ''; ?></a></th>
            <th><a href="?campo=uf&ordenacao=<?php echo isset($_GET['campo']) && $_GET['campo'] == 'uf' && isset($_GET['ordenacao']) && $_GET['ordenacao'] == 'ASC' ? 'DESC' : 'ASC'; ?>">UF <?php echo ($_GET['campo'] ?? '') === 'uf' ? ($_GET['ordenacao'] ?? '') === 'ASC' ? '<i class="bi bi-caret-up-fill"></i>' : '<i class="bi bi-caret-down-fill"></i>' : ''; ?></a></th>
            <th>Ações</th>
        </tr>
        <?php
        session_start();

        if (!isset($_SESSION["id"])) {
            die("Usuário não autenticado.");
        }

        include("conecta.php");

        $id = $_SESSION["id"];

        $ordenacao = isset($_GET['ordenacao']) ? $_GET['ordenacao'] : 'ASC';
        $campo = isset($_GET['campo']) ? $_GET['campo'] : 'logradouro';


        $comando = $pdo->prepare("SELECT * FROM enderecos WHERE id = :id ORDER BY $campo $ordenacao");
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
                    <td style=\"display: flex; justify-content: center; align-items: center;\">
                        <button class=\"btn-excluir\" onclick=\"confirmarExclusao('$endereco[id]', '$endereco[logradouro]', '$endereco[cidade]')\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </td>
                </tr>";
        }
        ?>
    </table>
</div>


    <script src="js/script.js"></script>

</body>
</html>