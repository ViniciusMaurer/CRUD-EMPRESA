<?php
    $descricaoTrabalho = $_POST['descricao'];

    include_once "../include/sessao.php"; // esse include verifica se ja tem um codigo assim e include apenas se não existe

    $sql = "INSERT INTO trabalhos (job_description) VALUES ('$descricaoTrabalho')";
    $result = mysqli_query($conn, $sql);

    if(! $result)
    {
        header("Location: ../index.html");
    }
    else
    {
        header("Location: consultaTrabalho.php");
    }

    mysqli_close($conn);
?>