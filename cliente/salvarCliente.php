<?php
    $cliente = $_POST['cliente'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    include_once "../include/sessao.php"; // esse include verifica se ja tem um codigo assim e include apenas se não existe

    $sql = "INSERT INTO clientes (nome, logradouro, complemento, bairro, cep, cidade, uf, email, idade) VALUES ('$cliente', '$logradouro', '$complemento', '$bairro', '$cep', '$cidade', '$uf', '$email', $idade)";
    $result = mysqli_query($conn, $sql);

    if(! $result)
    {
        header("Location: ../index.html");
    }
    else
    {
        header("Location: consultaCliente.php");
    }

    mysqli_close($conn);
?>