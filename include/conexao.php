<?php
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $banco = "crud_web_2024";

    $conn = mysqli_connect($localhost, $user, $password, $banco);

    if(! $conn)
    {
        header("Location: ../index.html");
    }
?>