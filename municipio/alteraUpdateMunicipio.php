<?php 
    $codigo = $_POST['codigo'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    include_once "../include/sessao.php";

    $sql = "UPDATE municipios SET cidade = '$cidade', uf = '$uf' WHERE idCidade = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaMunicipio.php");
    }

    mysqli_close($conn);
?>