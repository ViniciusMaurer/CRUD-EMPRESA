<?php
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];

    include_once "../include/sessao.php"; // esse include verifica se ja tem um codigo assim e include apenas se não existe

    $sql = "INSERT INTO municipios (cidade, uf) VALUES ('$cidade', '$uf')";
    $result = mysqli_query($conn, $sql);

    if(! $result)
    {
        header("Location: ../index.html");
    }
    else
    {
        header("Location: consultaMunicipio.php");
    }

    mysqli_close($conn);
?>