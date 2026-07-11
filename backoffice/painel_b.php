<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="../backoffice/css/painel.css">
</head>
<body>

<header class="topo">
    <div class="logo">
        <h1>MACAU D'OURO</h1>
        <p>Backoffice</p>
    </div>
</header>

<div class="painel">

    <h2>Bem-vindo</h2>

    <h3><?= htmlspecialchars($_SESSION['utilizador']) ?></h3>

    <nav class="menu-admin">
        <a href="reservas_b.php">Gerir Reservas</a>

        <a href="menu.php">Alterar Menu</a>

        <a href="precos.php">Alterar Preços</a>

        <a href="logout.php">Terminar Sessão</a>
    </nav>

</div>

</body>
</html>