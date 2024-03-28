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
            <li class="item-menu ativo">
                <a href="#">
                    <span class="icon"><i class="bi bi-search"></i></i></span>
                    <span class="txt-link">Consulta</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="registro.php">
                    <span class="icon"><i class="bi bi-columns-gap"></i></span>
                    <span class="txt-link">Registros</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="logout.php" onclick="return confirmarLogout()">
                    <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                    <span class="txt-link">Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="quadrado">
        <h1>Olá, 
        <?php session_start();
            echo $_SESSION["nome"]; 
        ?> </h1>
        <input name="cep" type="number" placeholder="Digite o CEP..." id="cep"/>
        <button onclick="consultaEndereco()" id="buscar"><span class="icon-buscar"><i class="bi bi-search"></i></i></span>Buscar</button>
        <div id="resultado">
            <p></p>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>