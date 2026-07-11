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
if (isset($_GET['acao']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($_GET['acao'] == 'aceitar') {
        $stmt = $pdo->prepare("UPDATE reservas SET estado='Aceite' WHERE id=?");
        $stmt->execute([$id]);
    }
    if ($_GET['acao'] == 'cancelar') {
        $stmt = $pdo->prepare("UPDATE reservas SET estado='Cancelada' WHERE id=?");
        $stmt->execute([$id]);
    }
    header("Location: reservas_b.php");
    exit;
}
$pesquisa = $_GET['pesquisa'] ?? '';
$estado = $_GET['estado'] ?? '';
$sql = "SELECT * FROM reservas WHERE 1=1";
$parametros = [];
if (!empty($pesquisa)) {
    $sql .= " AND nome LIKE ?";
    $parametros[] = "%$pesquisa%";
}
if (!empty($estado)) {
    $sql .= " AND estado = ?";
    $parametros[] = $estado;
}
$sql .= " ORDER BY data, hora";
$stmt = $pdo->prepare($sql);
$stmt->execute($parametros);

/* ALTERAR ESTADO */

if (isset($_GET['acao']) && isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    if ($_GET['acao'] == 'aceitar') {

        $stmt = $pdo->prepare("UPDATE reservas SET estado='Aceite' WHERE id=?");
        $stmt->execute([$id]);

    }

    if ($_GET['acao'] == 'cancelar') {

        $stmt = $pdo->prepare("UPDATE reservas SET estado='Cancelada' WHERE id=?");
        $stmt->execute([$id]);

    }

    header("Location: reservas.php");
    exit;
}

/* LISTAR RESERVAS */

$stmt = $pdo->query("SELECT * FROM reservas ORDER BY data, hora");
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">
<head>

<meta charset="UTF-8">

<title>Gerir Reservas</title>

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

<h2>Gerir Reservas</h2>

<table>

<thead>

<tr>

<th>Cliente</th>
<th>Pessoas</th>
<th>Data</th>
<th>Hora</th>
<th>Estado</th>
<th>Ações</th>
<th>Avisar Cliente</th>
</tr>
</thead>
<tbody>
<?php foreach($reservas as $r): ?>
<tr>
<td><?= htmlspecialchars($r['nome']) ?></td>
<td><?= $r['pessoas'] ?></td>
<td><?= date('d/m/Y', strtotime($r['data'])) ?></td>
<td><?= substr($r['hora'],0,5) ?></td>
<td>
<?php
if($r['estado']=="Pendente")
    echo "🟡 Pendente";
elseif($r['estado']=="Aceite")
    echo "🟢 Aceite";
else
    echo "🔴 Cancelada";
?>
</td>
<td>
<a class="aceitar" href="reservas.php?acao=aceitar&id=<?= $r['id'] ?>">✅</a>
<a class="cancelar" href="reservas.php?acao=cancelar&id=<?= $r['id'] ?>">❌</a>
</td>
<td>
<a class="email" href="aviso.php?id=<?= $r['id'] ?>">✉️</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</body>
</html>