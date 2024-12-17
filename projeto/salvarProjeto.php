<?php
    $descricaoProjeto = $_POST['descricao'];

    include_once "../include/sessao.php"; // esse include verifica se ja tem um codigo assim e include apenas se não existe

    $sql = "INSERT INTO projetos (plan_description) VALUES ('$descricaoProjeto')";
    $result = mysqli_query($conn, $sql);

    if(! $result)
    {
        header("Location: ../index.html");
    }
    else
    {
        header("Location: consultaProjeto.php");
    }

    mysqli_close($conn);
?>