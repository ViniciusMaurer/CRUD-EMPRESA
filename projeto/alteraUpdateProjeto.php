<?php 
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];

    include_once "../include/sessao.php";

    $sql = "UPDATE projetos SET plan_description = '$descricao' WHERE plan_code = $codigo";
    $result = mysqli_query($conn, $sql);

    if (! $result) {
        header("Location: ../index.html");
    }
    else {
        header("Location: consultaProjeto.php");
    }

    mysqli_close($conn);
?>