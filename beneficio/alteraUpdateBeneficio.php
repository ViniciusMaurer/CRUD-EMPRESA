<?php 
    $codFuncionario = $_POST['codFuncionario'];
    $codProjeto = $_POST['codProjeto'];

    $codigoF = $_POST['codigoF'];
    $codigoP = $_POST['codigoP'];

    include_once "../include/sessao.php";

    $sql = "SELECT emp_code, plan_code FROM beneficios WHERE emp_code = '$codFuncionario' AND plan_code = $codProjeto";
    $result = mysqli_query($conn, $sql);
    if (! $result) {
        header("Location: ../index.html");
    }
    else if (mysqli_num_rows($result) > 0){
        echo "<script>
                document.title = 'Erro de Update';
                alert('Erro: Você não pode ter registros duplicados!');
                window.location.href = '../consultaBeneficio.php';
              </script>";
    }
    else{
        $sql = "UPDATE beneficios SET emp_code = '$codFuncionario', plan_code = $codProjeto WHERE emp_code = $codigoF AND plan_code = $codigoP";
        $result = mysqli_query($conn, $sql);

        if (! $result) {
            header("Location: ../index.html");
        }
        else {
            header("Location: consultaBeneficio.php");
        }
    }

    mysqli_close($conn);
?>