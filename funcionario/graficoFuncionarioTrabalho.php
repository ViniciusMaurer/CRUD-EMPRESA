<?php
include('../include/conexao.php');

$sql = "SELECT t.job_description, COUNT(*) AS nrFuncionarios
            FROM funcionarios f
            JOIN trabalhos t ON f.job_code = t.job_code
            GROUP BY t.job_description";

$result = $conn->query($sql);

$funcionarios = [];
$quantidadeFuncionarios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $funcionarios[] = $row['job_description'];
        $quantidadeFuncionarios[] = (int) $row['nrFuncionarios'];
    }

    $conn->close();
} else {
    echo "Nenhum dado encontrado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <canvas id="funcionarios"></canvas>

    <script>
        var ctx = document.getElementById('funcionarios').getContext('2d');

        var vendasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($funcionarios); ?>,
                datasets: [{
                    label: 'Quantidade Funcionários',
                    data: <?php echo json_encode($quantidadeFuncionarios); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>