<?php 
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];

    include_once "../include/sessao.php";

    $sql = "UPDATE trabalhos SET job_description = '$descricao' WHERE job_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaTrabalho.php");
    }

    mysqli_close($conn);
?>