<?php
    $nomeFuncionario = $_POST['nome'];
    $jobCode = $_POST['codTrabalho'];

    include_once "../include/sessao.php"; // esse include verifica se ja tem um codigo assim e include apenas se não existe

    $sql = "INSERT INTO funcionarios (emp_lname, job_code) VALUES ('$nomeFuncionario', $jobCode)";
    $result = mysqli_query($conn, $sql);

    if(! $result)
    {
        header("Location: ../index.html");
    }
    else
    {
        header("Location: consultaFuncionario.php");
    }

    mysqli_close($conn);
?>