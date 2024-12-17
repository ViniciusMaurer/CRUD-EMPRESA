<?php 
    $codigo = $_GET['codigo'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM municipios WHERE idCidade = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaMunicipio.php");
    }

    mysqli_close($conn);
?>