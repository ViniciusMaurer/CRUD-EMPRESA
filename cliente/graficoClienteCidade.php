<?php
include('../include/conexao.php');

$sql = "SELECT c.cidade, COUNT(*) AS nrClientes
            FROM clientes c
            GROUP BY c.cidade";

$result = $conn->query($sql);

$clientes = [];
$quantidadeClientes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row['cidade'];
        $quantidadeClientes[] = (int) $row['nrClientes'];
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

    <canvas id="clientes"></canvas>

    <script>
        var ctx = document.getElementById('clientes').getContext('2d');

        var vendasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($clientes); ?>,
                datasets: [{
                    label: 'Quantidade Clientes',
                    data: <?php echo json_encode($quantidadeClientes); ?>,
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
