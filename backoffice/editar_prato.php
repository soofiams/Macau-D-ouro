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
    header("Location: menu.php");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->execute([$id]);
$prato = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$prato) {
    die("Prato não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->prepare("
        UPDATE menu
        SET
            categoria = ?,
            nome = ?,
            preco_eur = ?,
            preco_mop = ?,
            descricao = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $_POST['categoria'],
        $_POST['nome'],
        $_POST['preco_eur'],
        $_POST['preco_mop'],
        $_POST['descricao'],
        $id
    ]);

    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>

<meta charset="UTF-8">

<title>Editar Prato</title>

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

<h2>Editar Prato</h2>

<form method="post">

<label>Categoria</label>

<select name="categoria" required>

<?php
$categorias = [
    "Entradas",
    "Sopas",
    "Pratos Principais",
    "Sobremesas",
    "Bebidas"
];

foreach($categorias as $categoria){

    $selected = ($categoria == $prato['categoria']) ? "selected" : "";

    echo "<option value=\"$categoria\" $selected>$categoria</option>";
}
?>

</select>

<label>Nome do Prato</label>

<input
type="text"
name="nome"
value="<?= htmlspecialchars($prato['nome']) ?>"
required>

<label>Preço (€)</label>

<input
type="number"
step="0.01"
name="preco_eur"
value="<?= $prato['preco_eur'] ?>"
required>

<label>Preço (MOP)</label>

<input
type="number"
step="0.01"
name="preco_mop"
value="<?= $prato['preco_mop'] ?>"
required>

<label>Descrição</label>

<textarea
name="descricao"
rows="5"><?= htmlspecialchars($prato['descricao']) ?></textarea>

<button type="submit">

Guardar Alterações

</button>

</form>

<br>

<a href="menu.php" class="voltar">

← Voltar ao Menu

</a>

</div>

</body>

</html>