<?php
	// conexão
	include_once "../include/sessao.php";

	$hoje = date("d/m/Y");
	$ano = date("Y");

	$pagina = "<style type='text/css'>
            @page {
                margin: 80px 25px;
            }
			@media print {
				footer {
					page-break-after: always;
				}
			}
            #head {
				background-repeat: no-repeat;
				position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 120px;
                color: black;
                text-align: center;
                line-height: 35px;
				font-family: Arial, Helvetica, sans-serif;
            }
			.page:after {
				content: counter(page, decimal);
			}
			.pagenum:after {
				content: counter(page);
			}
			#header .pagenum:after {
				content: counter(page);
			}
			table {
				border-collapse: collapse;
				width: 100%;
				position: relative;
				font-family: Arial, Helvetica, sans-serif;
			}
			thead {
				display: table-header-group;
			}
			td {
				padding: 3px;
			}
            #footer {
				position: fixed;
				left: 0px;
                right: 0px;
				bottom: -60px;
                height: 70px; 
				width: 100%;
				color: black;
				text-align: center;
				font-size: 10px;
				font-family: Arial, Helvetica, sans-serif;
			}
 			#corpo {
				width: 100%;
				position: relative;
				margin: 0 auto;
			}
			.font-size{
				font-size: 12px;
			}
        </style>";

	$head = "
		<title>Geração de Relatório</title>
		<div id='head'>
			<table width='100%'>
				<tr>
					<td align='left'>
						<font size='1'>Data: ".$hoje."</font>
					</td>
					<td align='right'>
						<font size='1'><div class='pagenum-container'>Página: <span class='pagenum'></span></font></div></font>
					</td>
				</tr>
			</table>
			<table width='100%'>
				<tr>
					<td align='center' style='text-align: center; width: 100%;'>
						<div style='width: 100%;'>
							<font size='3'><b>RELATÓRIO DE MUNICÍPIOS</b></font>
						</div>
					</td>
				</tr>
			</table>
			<br>
			<hr style='width: 100%;'></hr>
		</div>

		<div id='footer'>
			<hr style='width: 100%;'></hr>
			<br>
			<b>INSTITUTO IVOTI</b><br>
			Ivoti / RS.<br>
			E-mail: vinicius.maurer@institutoivoti.com.br - http://www.institutoivoti.com.br<br>
			Direitos Reservados &copy; ".$ano." Vinicius Maurer
		</div>
		<div id='corpo'>";

	$tabela = "<table width='100%'>
					<br>
					<thead>
						<tr>
							<th class='font-size' style='width: 50%;' align='left'><p>Cidade</p></th>
							<th class='font-size' style='width: 50%;' align='left'><p>Estado</p></th>
						</tr>
					</thead>
	    			<tbody>";

	// monta query
	$sql = "SELECT cidade, uf FROM municipios";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		$tabela = $tabela."<tr>
						<td class='font-size' style='width: 50%;' align='left'>".$row[0]."</td>
						<td class='font-size' style='width: 50%;' align='left'>".$row[1]."</td>
					</tr>";
	}

	// fecha conexão
	mysqli_close($conn);

	$tabela = $tabela."</tbody>
				</table>
			</div>";

    $html = $pagina.$head.$tabela;

	// include autoloader
	require_once('../dompdf/autoload.inc.php');

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	//Criando a Instancia
	$dompdf = new Dompdf(); //['enable_remote' => true]

	// Definindo opções do PDF
	$dompdf->set_option('isRemoteEnabled', true);
	$dompdf->set_option('title', 'Relatório de Municípios'); // Define o título do PDF

	// Carrega seu HTML
	$dompdf->loadHtml($html);

	$dompdf->setPaper('A4','portrait');

	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream("relatorio_municipios.pdf", 
	array(
		"Attachment" => false // Para realizar o download somente alterar para true
	));
?>
