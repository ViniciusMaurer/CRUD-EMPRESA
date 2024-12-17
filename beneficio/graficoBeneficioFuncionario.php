<?php
include('../include/conexao.php');

$sql = "SELECT f.emp_lname, COUNT(*) AS nrFuncionarios
            FROM beneficios b
            JOIN projetos p ON b.plan_code = p.plan_code
            JOIN funcionarios f ON b.emp_code = f.emp_code
            GROUP BY f.emp_lname";

$result = $conn->query($sql);

$funcionarios = [];
$quantidadeFuncionarios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $funcionarios[] = $row['emp_lname'];
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
                    label: 'Quantidade Projetos',
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
