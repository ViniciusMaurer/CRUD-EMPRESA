<?php 
    $codigo = $_GET['codigo'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM funcionarios WHERE job_code = $codigo";
    $result = mysqli_query($conn, $sql);

    $sql = "DELETE FROM trabalhos WHERE job_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaTrabalho.php");
    }

    mysqli_close($conn);
?>