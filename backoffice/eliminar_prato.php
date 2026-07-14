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
    header("Location: menu_b.php");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->execute([$id]);
$prato = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$prato) {
    die("Prato não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['confirmar'])) {

        $stmt = $pdo->prepare("DELETE FROM menu WHERE id=?");
        $stmt->execute([$id]);

    }

    header("Location: menu_b.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8">

<title>Eliminar Prato</title>

<link rel="stylesheet" href="css/painel.css">

</head>

<body>

<header class="topo">

<div class="logo">

<h1>MACAU D'OURO</h1>

<p>Backoffice</p>

</div>

</header>

<div class="confirmacao">

<h2>Eliminar Prato</h2>

<p>

Tem a certeza que pretende eliminar o prato

<strong>

<?= htmlspecialchars($prato['nome']) ?>

</strong>?

</p>

<form method="post">

<button class="btn-vermelho" name="confirmar">

🗑️ Sim, eliminar

</button>

</form>

<br>

<a class="voltar" href="menu.php">

Cancelar

</a>

</div>

</body>

</html>