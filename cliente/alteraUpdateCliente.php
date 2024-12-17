<?php 
    $codigo = $_POST['codigo'];
    $cliente = $_POST['cliente'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    include_once "../include/sessao.php";

    $sql = "UPDATE clientes SET nome = '$cliente', 
                                logradouro = '$logradouro', 
                                complemento = '$complemento', 
                                bairro = '$bairro', 
                                cep = '$cep', 
                                cidade = '$cidade',
                                uf = '$uf',
                                email = '$email',
                                idade = $idade
                                WHERE idCliente = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaCliente.php");
    }

    mysqli_close($conn);
?>