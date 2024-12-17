<?php
include('../include/conexao.php');

$sql = "SELECT p.plan_description, COUNT(*) AS nrProjetos
            FROM beneficios b
            JOIN projetos p ON b.plan_code = p.plan_code
            JOIN funcionarios f ON b.emp_code = f.emp_code
            GROUP BY p.plan_description";

$result = $conn->query($sql);

$projetos = [];
$quantidadeProjetos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projetos[] = $row['plan_description'];
        $quantidadeProjetos[] = (int) $row['nrProjetos'];
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

    <canvas id="projetos"></canvas>

    <script>
        var ctx = document.getElementById('projetos').getContext('2d');

        var vendasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($projetos); ?>,
                datasets: [{
                    label: 'Quantidade Funcionários',
                    data: <?php echo json_encode($quantidadeProjetos); ?>,
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
