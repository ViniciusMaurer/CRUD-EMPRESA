<?php 
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $codigoTrabalho = $_POST['codTrabalho'];

    include_once "../include/sessao.php";

    $sql = "UPDATE funcionarios SET emp_lname = '$nome', job_code = $codigoTrabalho WHERE emp_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaFuncionario.php");
    }

    mysqli_close($conn);
?>