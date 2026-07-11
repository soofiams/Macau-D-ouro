<?php
session_start();

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

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: painel.php');
        exit;
    }

    $erro = 'Utilizador ou palavra-passe inválidos.';
}
?>
<form method="post">
    <label for="username">Utilizador</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Palavra-passe</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Entrar</button>
</form>