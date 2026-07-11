<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$utilizador = 'miguel_almeida'; // altera para o utilizador desejado
$palavraPasse = 'EscolheUmaPasswordForte';

$hash = password_hash($palavraPasse, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    'INSERT INTO administradores (utilizador, password_hash)
     VALUES (?, ?)'
);

$stmt->execute([$utilizador, $hash]);

echo 'Administrador criado com sucesso!';
?>