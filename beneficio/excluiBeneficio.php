<?php 
    $codFuncionario = $_GET['codFuncionario'];
    $codProjeto = $_GET['codProjeto'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM beneficios WHERE emp_code = $codFuncionario AND plan_code = $codProjeto";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaBeneficio.php");
    }

    mysqli_close($conn);
?>