<?php 
    $codFuncionario = $_GET['codFuncionario'];
    $nome = $_GET['nome'];
    $codProjeto = $_GET['codProjeto'];
    $descricao = $_GET['descricao'];
?>

<!DOCTYPE html>
<?php
    include_once "../include/sessao.php";
?>

<html lang="pt-br">

    <head>
        <title>Altera - Benefício</title>
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
                height: 100vh;
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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="alteraUpdateBeneficio.php" method="POST" autocomplete="off">
                            <div style="text-align: left;">Código</div>
                            <input type="text" name="codigoF" value="<?php echo $codFuncionario ?>" readonly>
                            <br>
                            <br>
                            <div style="text-align: left;">Funcionário</div>
                            <select class="form-control" name="codFuncionario">
                                <option value="<?php echo $codFuncionario ?>" selected><?php echo $nome ?></option>
                                <?php 
                                // conexão
                                $sql1 = "SELECT emp_code, emp_lname FROM funcionarios ORDER BY emp_lname";
                                $resultado1 = mysqli_query($conn, $sql1);
                                while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM))
                                { ?>
                                    <option value="<?php echo $linha1[0]; ?>"><?php echo $linha1[1]; ?></option>
                                <?php
                                } ?>
                            </select>
                            <br>
                            <br>
                            <div style="text-align: left;">Código</div>
                            <input type="text" name="codigoP" value="<?php echo $codProjeto ?>" readonly>
                            <br>
                            <br>
                            <div style="text-align: left;">Projeto</div>
                            <select class="form-control" name="codProjeto">
                                <option value="<?php echo $codProjeto ?>" selected><?php echo $descricao ?></option>
                                <?php 
                                // conexão
                                $sql1 = "SELECT plan_code, plan_description FROM projetos ORDER BY plan_description";
                                $resultado1 = mysqli_query($conn, $sql1);
                                while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM))
                                { ?>
                                    <option value="<?php echo $linha1[0]; ?>"><?php echo $linha1[1]; ?></option>
                                <?php
                                } ?>
                            </select>
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
                            <a href="consultaBeneficio.php">
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