<!DOCTYPE html>
<html>
<head>
	<title>Consulta - Cliente</title>
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
                                <a class="nav-link" id="navcolor" href="../beneficio/consultaBeneficio.php">Benefícios</a>
                                <a class="nav-link" id="navcolor" href="consultaCliente.php"><text class="selected">Clientes</text></a>
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
                <h1><b>CLIENTES</b></h1>
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
                        <form action="salvarCliente.php" method="POST" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Registro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-container">
                                        <div class="input-label">Nome do Cliente</div>
                                        <input type="text" name="cliente" placeholder="Informe o nome do cliente" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Logradouro</div>
                                        <input type="text" name="logradouro" placeholder="Informe o logradouro" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Complemento</div>
                                        <input type="text" name="complemento" placeholder="Informe o complemento" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Bairro</div>
                                        <input type="text" name="bairro" placeholder="Informe o bairro" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">CEP</div>
                                        <input type="text" name="cep" placeholder="Informe o CEP" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Cidade</div>
                                        <input type="text" name="cidade" placeholder="Informe a cidade" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">UF</div>
                                        <input type="text" name="uf" placeholder="Informe o UF" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Email</div>
                                        <input type="text" name="email" placeholder="Informe o Email" required>
                                    </div>

                                    <div class="input-container">
                                        <div class="input-label">Idade</div>
                                        <input type="number" name="idade" placeholder="Informe a idade" required>
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
                
                <a href="relatorioCliente.php" target="_blank">
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

        $sql = "SELECT COUNT(*) AS nroRegistros 
                  FROM clientes
                 WHERE UPPER(nome) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(logradouro) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(complemento) LIKE UPPER('%$pesquisa%')
                   OR UPPER(bairro) LIKE UPPER('%$pesquisa%')
                   OR UPPER(cep) LIKE UPPER('%$pesquisa%')
                   OR UPPER(cidade) LIKE UPPER('%$pesquisa%')
                   OR UPPER(uf) LIKE UPPER('%$pesquisa%')
                   OR UPPER(email) LIKE UPPER('%$pesquisa%')
                   OR UPPER(idade) LIKE UPPER('%$pesquisa%')";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $countRegistros = $row['nroRegistros'];

        $sql = "SELECT * 
                  FROM clientes 
                 WHERE UPPER(nome) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(logradouro) LIKE UPPER('%$pesquisa%') 
                   OR UPPER(complemento) LIKE UPPER('%$pesquisa%')
                   OR UPPER(bairro) LIKE UPPER('%$pesquisa%')
                   OR UPPER(cep) LIKE UPPER('%$pesquisa%')
                   OR UPPER(cidade) LIKE UPPER('%$pesquisa%')
                   OR UPPER(uf) LIKE UPPER('%$pesquisa%')
                   OR UPPER(email) LIKE UPPER('%$pesquisa%')
                   OR UPPER(idade) LIKE UPPER('%$pesquisa%')
                  LIMIT $inicio, $limite";
        $result = mysqli_query($conn, $sql);
    }else{
        $sql = "SELECT COUNT(*) AS nroRegistros FROM clientes";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $countRegistros = $row['nroRegistros'];

        $sql = "SELECT * FROM clientes LIMIT $inicio, $limite";
        $result = mysqli_query($conn, $sql);
    }
	?>

	<div class="container bg-white">
		<div class="row">
			<div class="col-12" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
				<table class="table table-striped" style="margin-top: 10px;">
					<thead>
						<tr>
							<th scope="col">Código</th>
							<th scope="col">Nome</th>
							<th scope="col">Logradouro</th>
							<th scope="col">Complemento</th>
							<th scope="col">Bairro</th>
							<th scope="col">CEP</th>
							<th scope="col">Cidade</th>
							<th scope="col">Estado</th>
							<th scope="col">Email</th>
							<th scope="col">Idade</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
						?>
						<tr class="linha" ondblclick="document.location = 'alteraCliente.php?codigo=<?php echo $row[0]; ?>&cliente=<?php echo $row[1]; ?>&logradouro=<?php echo $row[2]; ?>&complemento=<?php echo $row[3]; ?>&bairro=<?php echo $row[4]; ?>&cep=<?php echo $row[5]; ?>&cidade=<?php echo $row[6]; ?>&uf=<?php echo $row[7]; ?>&email=<?php echo $row[8]; ?>&idade=<?php echo $row[9]; ?>'">
							<td><?php echo $row[0]; ?></td>
							<td><?php echo $row[1]; ?></td>
							<td><?php echo $row[2]; ?></td>
							<td><?php echo $row[3]; ?></td>
							<td><?php echo $row[4]; ?></td>
							<td><?php echo $row[5]; ?></td>
							<td><?php echo $row[6]; ?></td>
							<td><?php echo $row[7]; ?></td>
							<td><?php echo $row[8]; ?></td>
							<td><?php echo $row[9]; ?></td>
							<td class="text-end">
                                <button title="Excluir Registro" type="button" class="btn btn-excluir" style="border: 1px solid #E62222" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row[0]; ?>"><img class="img-fluid" src="../img/excluir.png"></button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal<?php echo $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="button" class="btn btn-danger" onclick="document.location = 'excluiCliente.php?codigo=<?php echo $row[0]; ?>'">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
					</tbody>
				</table>
				<div class="pagination">
                    <div class="pagination-controls">
                        <?php 
                        if ($inicio - $limite >= 0) { ?>
                            <form action="consultaCliente.php" method="POST" class="pagination-form">
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
                            <form action="consultaCliente.php" method="POST" class="pagination-form">
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
                <h1><b>ANÁLISE CLIENTES POR CIDADE</b></h1>
            </div>
        </div>
    </div>
    <div class="container mb-5 bg-white">
		<div class="row">
			<div class="col-12" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                <?php
                include('graficoClienteCidade.php');
                ?>
            </div>
        </div>
    </div>

</body>
</html>