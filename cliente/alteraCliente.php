<?php 
    $codigo = $_GET['codigo'];
    $cliente = $_GET['cliente'];
    $logradouro = $_GET['logradouro'];
    $complemento = $_GET['complemento'];
    $bairro = $_GET['bairro'];
    $cep = $_GET['cep'];
    $cidade = $_GET['cidade'];
    $uf = $_GET['uf'];
    $email = $_GET['email'];
    $idade = $_GET['idade'];
?>

<!DOCTYPE html>
<?php
    include_once "../include/sessao.php";
?>

<html lang="pt-br">

    <head>
        <title>Altera - Cliente</title>
        <link rel="icon" type="image/x-icon" href="../img/elefante.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            form {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>
        <center>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <form action="alteraUpdateCliente.php" method="POST" autocomplete="off">
                            <div style="text-align: left;">Código</div>
                            <input type="text" name="codigo" value="<?php echo $codigo ?>" readonly>
                            <br>
                            <br>
                            <div style="text-align: left;">Nome do Cliente</div>
                            <input type="text" name="cliente" value="<?php echo $cliente ?>" required>
                            <br><br>
                            <div style="text-align: left;">Logradouro</div>
                            <input type="text" name="logradouro" value="<?php echo $logradouro ?>"  required>
                            <br><br>
                            <div style="text-align: left;">Complemento</div>
                            <input type="text" name="complemento" value="<?php echo $complemento ?>"  required>
                            <br><br>
                            <div style="text-align: left;">Bairro</div>
                            <input type="text" name="bairro" value="<?php echo $bairro ?>"  required>
                            <br><br>
                            <div style="text-align: left;">CEP</div>
                            <input type="text" name="cep" value="<?php echo $cep ?>"  required>
                            <br><br>
                            <div style="text-align: left;">Cidade</div>
                            <input type="text" name="cidade" value="<?php echo $cidade ?>"  required>
                            <br><br>
                            <div style="text-align: left;">UF</div>
                            <input type="text" name="uf" value="<?php echo $uf ?>"  required>
                            <br><br>
                            <div style="text-align: left;">Email</div>
                            <input type="text" name="email" value="<?php echo $email ?>"  required>
                            <br><br>
                            <div style="text-align: left;">Idade</div>
                            <input type="number" name="idade" value="<?php echo $idade ?>"  required>
                            <br><br>
                            <button type="submit" class="btn btn-success">Alterar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container py-3">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <a href="consultaCliente.php">
                                <button class="btn btn-info text-white">Voltar</button>
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </center>

        <?php
            mysqli_close($conn);
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

</html>