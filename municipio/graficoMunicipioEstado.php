<?php
include('../include/conexao.php');

$sql = "SELECT m.uf, COUNT(*) AS nrMunicipios
            FROM municipios m
            GROUP BY m.uf";

$result = $conn->query($sql);

$municipios = [];
$quantidadeMunicipios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $municipios[] = $row['uf'];
        $quantidadeMunicipios[] = (int) $row['nrMunicipios'];
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

    <canvas id="municipios"></canvas>

    <script>
        var ctx = document.getElementById('municipios').getContext('2d');

        var vendasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($municipios); ?>,
                datasets: [{
                    label: 'Quantidade Cidades',
                    data: <?php echo json_encode($quantidadeMunicipios); ?>,
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
