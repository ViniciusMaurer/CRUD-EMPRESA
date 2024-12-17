<?php 
    $codigo = $_GET['codigo'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM beneficios WHERE emp_code = $codigo";
    $result = mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM funcionarios WHERE emp_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaFuncionario.php");
    }

    mysqli_close($conn);
?>