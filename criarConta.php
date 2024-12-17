<?php
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    session_start();

    include_once "include/conexao.php";

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$usuario', '$senha')";
    $result = mysqli_query($conn, $sql);
	
	if ($result) {
		// cria sessao
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha'] = $senha;

		header('Location: menu.php');
	}
	else {
		header('Location: index.html');
	}

    mysqli_close($conn);
?>