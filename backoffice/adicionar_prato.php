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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->prepare("
        INSERT INTO menu
        (categoria, nome, preco_eur, preco_mop, descricao)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['categoria'],
        $_POST['nome'],
        $_POST['preco_eur'],
        $_POST['preco_mop'],
        $_POST['descricao']
    ]);

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8">

<title>Adicionar Prato</title>

<link rel="stylesheet" href="css/painel.css">

</head>

<body>

<header class="topo">

<div class="logo">
<h1>MACAU D'OURO</h1>
<p>Backoffice</p>
</div>

</header>

<div class="formulario">

<h2>Adicionar Prato</h2>

<form method="post">

<label>Categoria</label>

<select name="categoria" required>

<option value="">Escolha...</option>

<option>Entradas</option>

<option>Sopas</option>

<option>Pratos Principais</option>

<option>Sobremesas</option>

<option>Bebidas</option>

</select>

<label>Nome do Prato</label>

<input
type="text"
name="nome"
required>

<label>Preço (€)</label>

<input
type="number"
step="0.01"
name="preco_eur"
required>

<label>Preço (MOP)</label>

<input
type="number"
step="0.01"
name="preco_mop"
required>

<label>Descrição</label>

<textarea
name="descricao"
rows="5"></textarea>

<button type="submit">

Guardar Prato

</button>

</form>

<br>

<a href="menu_b.php" class="voltar">

← Voltar ao Menu

</a>

</div>

</body>

</html>