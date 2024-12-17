<!DOCTYPE html>
<html>
<head>
    <title>Consulta - Benefício</title>
    <link rel="icon" type="image/x-icon" href="../img/elefante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <header>
        <div class="container-fluid bg-white">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light navbar-style">
                        <a class="navbar-brand" id="navcolor" href="../menu.php"><img class="img-fluid logoweb" src="../img/logo_vmaurer.png"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" id="navcolor" href="consultaBeneficio.php"><text class="selected">Benefícios</text></a>
                                <a class="nav-link" id="navcolor" href="../cliente/consultaCliente.php">Clientes</a>
                                <a class="nav-link" id="navcolor" href="../funcionario/consultaFuncionario.php">Funcionários</a>
                                <a class="nav-link" id="navcolor" href="../municipio/consultaMunicipio.php">Municípios</a>
                                <a class="nav-link" id="navcolor" href="../projeto/consultaProjeto.php">Projetos</a>
                                <a class="nav-link" id="navcolor" href="../trabalho/consultaTrabalho.php">Trabalhos</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <?php
        include_once "../include/sessao.php";
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-4 text-info">
                <h1><b>BENEFÍCIOS</b></h1>
            </div>
            <div class="col-4 text-center">
                <form method="POST" id="form-pesquisa" action="" class="d-flex justify-content-center align-items-center">
                    <input type="text" name="pesquisa" id="pesquisa" class="form-control me-2" placeholder="Digite algo..." autocomplete="off">
                    <button class="btn btn-info text-white" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="col-4 text-end" style="vertical-align: middle;">
                <button title="Adicionar Registro" type="button" class="btn btn-info btn-adicionar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="../img/adicionar-registro.png" alt="Adicionar Registro">
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="salvarBeneficio.php" method="POST" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Registro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-container">
                                        <div class="input-label">Nome do Funcionário</div>
                                        <select class="form-control" id="funcionario" name="funcionario">
                                            <option value="" selected>Selecione...</option>
                                            <?php 
                                            // conexão
                                            $sql1 = "SELECT emp_code, emp_lname FROM funcionarios ORDER BY emp_lname";
                                            $resultado1 = mysqli_query($conn, $sql1);
                                            while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM)) { ?>
                                                <option value="<?php echo $linha1[0]; ?>"><?php echo $linha1[1]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Nome do Projeto</div>
                                        <select class="form-control" id="projeto" name="projeto">
                                            <option value="" selected>Selecione...</option>
                                            <?php 
                                            // conexão
                                            $sql1 = "SELECT plan_code, plan_description FROM projetos ORDER BY plan_description";
                                            $resultado1 = mysqli_query($conn, $sql1);
                                            while ($linha1 = mysqli_fetch_array($resultado1, MYSQLI_NUM)) { ?>
                                                <option value="<?php echo $linha1[0]; ?>"><?php echo $linha1[1]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <a href="relatorioBeneficio.php" target="_blank">
                    <button title="Gerar Relatório" type="button" class="btn btn-info btn-adicionar">
                        <img src="../img/relatorio.png" alt="Gerar Relatório">
                    </button>
                </a>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["inicio"]) && !empty($_POST["inicio"])) {
        $inicio = $_POST["inicio"];
    } else {
        $inicio = 0;
    }
    $limite = 7;


    if (isset($_POST['pesquisa']) && !empty($_POST['pesquisa'])) {
        $pesquisa = $_POST['pesquisa'];

        $sql = "SELECT COUNT(beneficios.emp_code) AS nroRegistros
                FROM beneficios, funcionarios, projetos
                WHERE beneficios.emp_code = funcionarios.emp_code AND beneficios.plan_code = projetos.plan_code
                  AND (UPPER(funcionarios.emp_lname) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(projetos.plan_description) LIKE UPPER('%$pesquisa%'))
                ORDER BY funcionarios.emp_lname";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $countRegistros = $row['nroRegistros'];

        $sql = "SELECT beneficios.emp_code, funcionarios.emp_lname, beneficios.plan_code, projetos.plan_description 
                FROM beneficios, funcionarios, projetos
                WHERE beneficios.emp_code = funcionarios.emp_code AND beneficios.plan_code = projetos.plan_code
                  AND (UPPER(funcionarios.emp_lname) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(projetos.plan_description) LIKE UPPER('%$pesquisa%'))
                ORDER BY funcionarios.emp_lname LIMIT $inicio, $limite";
        $result = mysqli_query($conn, $sql);
    }else{
        $sql = "SELECT COUNT(beneficios.emp_code) AS nroRegistros
                FROM beneficios, funcionarios, projetos
                WHERE beneficios.emp_code = funcionarios.emp_code AND beneficios.plan_code = projetos.plan_code
                ORDER BY funcionarios.emp_lname";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $countRegistros = $row['nroRegistros'];

        $sql = "SELECT beneficios.emp_code, funcionarios.emp_lname, beneficios.plan_code, projetos.plan_description 
                FROM beneficios, funcionarios, projetos
                WHERE beneficios.emp_code = funcionarios.emp_code AND beneficios.plan_code = projetos.plan_code
                ORDER BY funcionarios.emp_lname LIMIT $inicio, $limite";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <div class="container bg-white">
        <div class="row">
            <div class="col-12" style="border: 1px solid #ddd;  border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <table class="table table-striped" style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th align="left">Código Funcionário</th>
                            <th align="left">Nome</th>
                            <th align="left">Código Projeto</th>
                            <th align="left">Descrição do Projeto</th>
                            <th align="left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        ?>
                        <tr class="linha" ondblclick="document.location = 'alteraBeneficio.php?codFuncionario=<?php echo $row[0]; ?>&nome=<?php echo $row[1]; ?>&codProjeto=<?php echo $row[2]; ?>&descricao=<?php echo $row[3]; ?>'">
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td class="text-end">
                                <button title="Excluir Registro" type="button" class="btn btn-excluir" style="border: 1px solid #E62222" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row[0] . $row[2]; ?>"><img class="img-fluid" src="../img/excluir.png"></button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal<?php echo $row[0] . $row[2]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja excluir esse registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" onclick="document.location = 'excluiBeneficio.php?codFuncionario=<?php echo $row[0]; ?>&codProjeto=<?php echo $row[2]; ?>'">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <div class="pagination-controls">
                        <?php 
                        if ($inicio - $limite >= 0) { ?>
                            <form action="consultaBeneficio.php" method="POST" class="pagination-form">
                                <input type="hidden" name="inicio" value="<?php echo $inicio - $limite; ?>">
                                <?php if(!empty($pesquisa)){?>
                                    <input type="hidden" name="pesquisa" value="<?php echo $pesquisa; ?>">
                                <?php } ?>
                                <input type="submit" value="anterior" class="pagination-button">
                            </form>
                        <?php } ?>
                    </div>
                    <div class="pagination-controls">
                        <?php 
                        if ($countRegistros > $inicio + $limite) { ?>
                            <form action="consultaBeneficio.php" method="POST" class="pagination-form">
                                <input type="hidden" name="inicio" value="<?php echo $inicio + $limite; ?>">
                                <?php if(!empty($pesquisa)){?>
                                    <input type="hidden" name="pesquisa" value="<?php echo $pesquisa; ?>">
                                <?php } ?>
                                <input type="submit" value="próximo" class="pagination-button">
                            </form>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    mysqli_close($conn);
    ?>

    <script>
        $(document).ready(function () {
            $("#pesquisa").keyup(function () {
                var pesquisa = $(this).val();
                var dados = { pesquisa: pesquisa };

                $.post(window.location.href, dados, function (retorna) {
                    $(".resultado").html(retorna); 
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-info">
                <h1><b>ANÁLISE FUNCIONÁRIOS POR PROJETO</b></h1>
            </div>
        </div>
    </div>
    <div class="container mb-5 bg-white">
		<div class="row">
			<div class="col-12" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <?php
                include('graficoBeneficioProjeto.php');
                ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-info">
                <h1><b>ANÁLISE PROJETOS POR FUNCIONÁRIO</b></h1>
            </div>
        </div>
    </div>
    <div class="container mb-5 bg-white">
		<div class="row">
			<div class="col-12" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <?php
                include('graficoBeneficioFuncionario.php');
                ?>
            </div>
        </div>
    </div>

</body>
</html>