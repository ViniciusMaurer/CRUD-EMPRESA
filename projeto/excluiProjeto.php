<?php 
    $codigo = $_GET['codigo'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM beneficios WHERE plan_code = $codigo";
    $result = mysqli_query($conn, $sql);

    $sql = "DELETE FROM projetos WHERE plan_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaProjeto.php");
    }

    mysqli_close($conn);
?>