<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$sql = "INSERT INTO reservas
        (nome, telefone, email, pessoas, data, hora, motivo, pedidos)
        VALUES (:nome, :telefone, :email, :pessoas, :data, :hora, :motivo, :pedidos)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome'      => $_POST['nome'],
    ':telefone'  => $_POST['telefone'],
    ':email'     => $_POST['email'],
    ':pessoas'   => (int)$_POST['pessoas'],
    ':data'      => $_POST['data'],
    ':hora'      => $_POST['hora'],
    ':motivo'    => $_POST['motivo'],
    ':pedidos'   => $_POST['pedidos'] ?? ''
]);

echo "Reserva efetuada com sucesso!";
?>