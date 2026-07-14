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

$stmt = $pdo->query("
    SELECT *
    FROM menu
    ORDER BY
        FIELD(categoria,
            'Entradas',
            'Sopas',
            'Pratos Principais',
            'Sobremesas',
            'Bebidas'),
        nome
");

$pratos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Gerir Menu</title>
<link rel="stylesheet" href="css/painel.css">
</head>
<body>
<header class="topo">
<div class="logo">
<h1>MACAU D'OURO</h1>
<p>Backoffice</p>
</div>
</header>
<div class="conteudo">
<h2>Gerir Menu</h2>
<a href="adicionar_prato.php" class="novo-prato">
➕ Adicionar Prato
</a>
<table>
<thead>
<tr>
<th>Categoria</th>
<th>Prato</th>
<th>Preço (€)</th>
<th>Preço (MOP)</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
<?php foreach($pratos as $prato): ?>
<tr>
<td><?= htmlspecialchars($prato['categoria']) ?></td>
<td><?= htmlspecialchars($prato['nome']) ?></td>
<td><?= number_format($prato['preco_eur'],2,",",".") ?> €</td>
<td><?= number_format($prato['preco_mop'],2,",",".") ?> MOP</td>
<td>
<a class="editar" href="editar_prato.php?id=<?= $prato['id'] ?>">
✏️
</a>
<a class="eliminar"
onclick="return confirm('Pretende eliminar este prato?')"
href="eliminar_prato.php?id=<?= $prato['id'] ?>">
🗑️
</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</body>
</html>