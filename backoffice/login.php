<?php
session_start();

$erro = '';

$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        'SELECT id, utilizador, password_hash
         FROM administradores
         WHERE utilizador = ?'
    );

    $stmt->execute([$_POST['username']]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($admin && $_POST['password'] === $admin['password_hash']) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['utilizador'] = $admin['utilizador'];

        header('Location: painel.php');
        exit;
    }

    $erro = 'Utilizador ou palavra-passe inválidos.';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login Backoffice</title>
    <link rel="stylesheet" href="../backoffice/css/style_b.css">
</head>
<body>
    <?php if ($erro): ?>
        <p><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <div class="logo">
        <h1>MACAU D'OURO</h1>
        <p>Backoffice</p>
    </div>

    <form method="post">
        <label for="username">Utilizador</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Palavra-passe</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>