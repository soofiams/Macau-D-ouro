<?php


$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$stmt = $pdo->query(
    "SELECT nome, telefone, pessoas, data, hora, motivo
     FROM reservas
     ORDER BY data, hora"
);
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
    <link rel="stylesheet" href="css/style_b.css">
</head>
<body>
<div class="login-card" style="width:900px">
    <div class="logo">
        <h1>MACAU D'OURO</h1>
        <p>Reservas</p>
    </div>

    <table style="width:100%;border-collapse:collapse">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Pessoas</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Motivo</th>
        </tr>
        <?php foreach ($reservas as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['nome']) ?></td>
            <td><?= htmlspecialchars($r['telefone']) ?></td>
            <td><?= (int)$r['pessoas'] ?></td>
            <td><?= htmlspecialchars($r['data']) ?></td>
            <td><?= htmlspecialchars($r['hora']) ?></td>
            <td><?= htmlspecialchars($r['motivo']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>