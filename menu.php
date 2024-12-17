<!DOCTYPE html>
<?php
    include_once "include/sessao.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/elefante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Menu</title>
</head>
<body class="bg-light">
    <header>
        <div class="container-fluid bg-white fixed-top">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light navbar-style">
                        <a class="navbar-brand" id="navcolor" href="menu.php"><img class="img-fluid logoweb" src="img/logo_vmaurer.png"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" id="navcolor" href="beneficio/consultaBeneficio.php">Benefícios</a>
                                <a class="nav-link" id="navcolor" href="cliente/consultaCliente.php">Clientes</a>
                                <a class="nav-link" id="navcolor" href="funcionario/consultaFuncionario.php">Funcionários</a>
                                <a class="nav-link" id="navcolor" href="municipio/consultaMunicipio.php">Municípios</a>
                                <a class="nav-link" id="navcolor" href="projeto/consultaProjeto.php">Projetos</a>
                                <a class="nav-link" id="navcolor" href="trabalho/consultaTrabalho.php">Trabalhos</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <?php
        $username = $_SESSION["usuario"];

        $sql = "SELECT nome FROM usuarios WHERE email = '$username'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $nome = $row['nome'];
    ?>

    <div class="container-fluid d-flex align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <h1>Bem-vindo(a), <span style="font-weight: bold;"><?php echo htmlspecialchars($nome); ?></span>!</h1>
                <br>
                <h5>É um prazer tê-lo(a) aqui. Aproveite ao máximo o site desenvolvido na disciplina de Desenvolvimento Web, do curso técnico em TI do Instituto Ivoti.</h5>
                <br>
                <button class="btn text-white" style="background-color: #ff2e56;" onclick="document.location = 'include/logout.php'">Fazer Logout</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        mysqli_close($conn);
    ?>
</body>
</html>