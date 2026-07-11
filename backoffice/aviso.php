<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

if (!isset($_GET['id'])) {
    die("Reserva não encontrada.");
}

$stmt = $pdo->prepare("SELECT * FROM reservas WHERE id = ?");
$stmt->execute([$_GET['id']]);
$reserva = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reserva) {
    die("Reserva não encontrada.");
}

$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Aqui vamos colocar o envio do email mais tarde

    $sucesso = true;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>

<meta charset="UTF-8">

<title>Avisar Cliente</title>

<link rel="stylesheet" href="css/painel.css">

</head>

<body>

<header class="topo">

<div class="logo">
<h1>MACAU D'OURO</h1>
<p>Backoffice</p>
</div>

</header>

<div class="aviso">

<h2>Avisar Cliente</h2>

<?php if($sucesso): ?>

<div class="sucesso">

✅ O aviso foi enviado com sucesso!

</div>

<?php endif; ?>

<p><strong>Cliente:</strong> <?= htmlspecialchars($reserva['nome']) ?></p>

<p><strong>Email:</strong> <?= htmlspecialchars($reserva['email']) ?></p>

<form method="post">

<label>Mensagem</label>

<textarea name="mensagem" required>

Olá <?= htmlspecialchars($reserva['nome']) ?>,

A sua reserva no restaurante Macau D'Ouro foi analisada.

Obrigado pela preferência.

</textarea>

<button type="submit">

✉️ Enviar Aviso

</button>

</form>

<br>

<a class="voltar" href="reservas_b.php">

← Voltar às Reservas

</a>

</div>

</body>

</html>