<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>

<div class="login-card" style="width: 500px;">
    <div class="logo">
        <h1>MACAU D'OURO</h1>
        <p>Backoffice</p>
    </div>

    <h2 style="text-align:center;">Bem-vindo, <?= htmlspecialchars($_SESSION['utilizador']) ?>!</h2>

    <div style="display:grid; gap:1rem; margin-top:2rem;">
        <a href="reservas.php"><button type="button">Gerir Reservas</button></a>
        <a href="precos.php"><button type="button">Gerir Menu e Preços</button></a>
        <a href="logout.php"><button type="button">Terminar Sessão</button></a>
    </div>
</div>