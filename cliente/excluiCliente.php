<?php 
    $codigo = $_GET['codigo'];

    include_once "../include/sessao.php";

    $sql = "DELETE FROM clientes WHERE idCliente = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaCliente.php");
    }

    mysqli_close($conn);
?>