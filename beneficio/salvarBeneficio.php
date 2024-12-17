<?php
	$funcionario = $_POST['funcionario'];
	$projeto = $_POST['projeto'];

	include_once "../include/sessao.php";

	$sql = "SELECT emp_code, plan_code FROM beneficios WHERE emp_code = '$funcionario' AND plan_code = $projeto";
	$result = mysqli_query($conn, $sql);

	if (! $result) {
		header("Location: ../index.html");
	}
	else if (mysqli_num_rows($result) > 0){
		echo "<script>
				document.title = 'Erro de Update';
				alert('Erro: Você não pode ter registros duplicados!');
				window.location.href = 'consultaBeneficio.php';
			</script>";
	}
	else{
		$sql = "INSERT INTO beneficios (emp_code, plan_code) VALUES ('$funcionario', '$projeto')";
		$result = mysqli_query($conn, $sql);

		if (! $result) {
			header("Location: ../index.html");
		}
		else {
			header("Location: consultaBeneficio.php");
		}
	}

	mysqli_close($conn);
?>