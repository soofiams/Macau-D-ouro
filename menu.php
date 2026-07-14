<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macau d'Ouro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="hero">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand logo" href="#">
                    Macau d'Ouro
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="historia.html">História</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-contacto" href="reservas.html">
                                Reservas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="hero-content">
            <span class="subtitle">
                Porto • Portugal
            </span>
            <h1>
                Sabores de Macau,<br>
                alma portuguesa.
            </h1>
            <p>Uma experiência gastronómica inspirada na fusão entre Portugal e Macau, num ambiente elegante e
                acolhedor.</p>
            <div class="hero-buttons">
                <a href="reservas.html" class="btn btn-gold">
                    Reservar Mesa
                </a>
                <a href="menu.php" class="btn btn-outline">
                    Ver Menu
                </a>
            </div>
        </div>
    </header>
    <main>
        <section class="menu-page">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="menu-subtitle">
                        MACAU D'OURO
                    </span>
                    <h1 class="menu-title">O Nosso Menu</h1>
                    <p class="menu-description">
                        Uma viagem gastronómica inspirada na fusão entre
                        Portugal e Macau.
                    </p>
                </div>
                <?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=macau_douro;charset=utf8mb4',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$categorias = [
    "Entradas",
    "Sopas",
    "Pratos Principais",
    "Sobremesas",
    "Bebidas"
];
foreach ($categorias as $categoria):
?>
                <div class="menu-category">
                    <h2>
                        <?= htmlspecialchars($categoria) ?>
                    </h2>
                    <?php
    $stmt = $pdo->prepare("
        SELECT *
        FROM menu
        WHERE categoria = ?
        ORDER BY nome
    ");
    $stmt->execute([$categoria]);
    while ($prato = $stmt->fetch(PDO::FETCH_ASSOC)):
    ?>
                    <div class="menu-item">
                        <span>
                            <?= htmlspecialchars($prato['nome']) ?>
                        </span>
                        <span>
                            <?= number_format($prato['preco_eur'],2,",",".") ?> €
                            /
                            <?= number_format($prato['preco_mop'],0,",",".") ?> MOP
                        </span>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endforeach; ?>
                <div class="menu-category">
                    <h2>Sopas</h2>
                    <div class="menu-item">
                        <span>Canja Macaense</span>
                        <span>7,50 € / 69 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Creme de Legumes</span>
                        <span>6,90 € / 63 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Sopa de Marisco</span>
                        <span>9,50 € / 87 MOP</span>
                    </div>
                </div>
                <div class="menu-category">
                    <h2>Pratos Principais</h2>
                    <div class="menu-item">
                        <span>Minchi</span>
                        <span>18,90 € / 174 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Galinha Africana</span>
                        <span>21,50 € / 198 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Tacho Macaense</span>
                        <span>26,00 € / 239 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Arroz Chau-Chau</span>
                        <span>17,50 € / 161 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Pato Assado com Molho Oriental</span>
                        <span>24,50 € / 225 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Bacalhau à Macau</span>
                        <span>22,90 € / 211 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Camarão ao Tamarindo</span>
                        <span>24,90 € / 229 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Lombo de Novilho com Molho de Pimenta</span>
                        <span>28,50 € / 262 MOP</span>
                    </div>
                </div>
                <div class="menu-category">
                    <h2>Sobremesas</h2>
                    <div class="menu-item">
                        <span>Serradura</span>
                        <span>7,50 € / 69 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Pastel de Nata</span>
                        <span>3,20 € / 29 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Pudim Abade de Priscos</span>
                        <span>6,50 € / 60 MOP </span>
                    </div>
                    <div class="menu-item">
                        <span>Mousse de Chocolate</span>
                        <span>6,00 € / 55 MOP</span>
                    </div>
                    <div class="menu-item">
                        <span>Bolo de Amêndoa</span>
                        <span>5,90 € / 54 MOP</span>
                    </div>
                </div>
                <div class="menu-category">
                    <h2>Bebidas</h2>
                    <div class="menu-item">
                        <span>Água Mineral</span>
                        <span>2,20 € / 20 MOP</span>
                    </div>

                    <div class="menu-item">
                        <span>Refrigerantes</span>
                        <span>2,80 € / 26 MOP</span>
                    </div>

                    <div class="menu-item">
                        <span>Chá de Jasmim</span>
                        <span>3,80 € / 35 MOP </span>
                    </div>

                    <div class="menu-item">
                        <span>Café Expresso</span>
                        <span>2,00 € / 18 MOP</span>
                    </div>

                    <div class="menu-item">
                        <span>Vinho do Porto (Copo)</span>
                        <span>5,90 € / 54 MOP</span>
                    </div>

                    <div class="menu-item">
                        <span>Vinho da Casa (Garrafa)</span>
                        <span>19,50 € / 179 MOP</span>
                    </div>

                </div>
            </div>
        </section>
        <section class="reservation-section">
            <div class="container text-center">
                <h2>Pronto para viver esta experiência?</h2>
                <p> Reserve a sua mesa e descubra os sabores únicos que unem
                    Portugal e Macau.
                </p>
                <a href="reservas.html" class="btn-reservar">
                    Reservar Mesa
                </a>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Restaurante -->
                <div class="col-lg-4 mb-5">
                    <h2 class="footer-logo">
                        Macau d'Ouro
                    </h2>
                    <p class="footer-text">
                        Sabores de Macau, alma portuguesa.
                        Uma experiência gastronómica que celebra a ligação
                        entre Portugal e Macau, no coração do Porto.
                    </p>
                </div>
                <div class="col-lg-2 mb-5">
                </div>
                <div class="col-lg-3 mb-5">
                    <h5>Contactos</h5>
                    <p>Rua de Santa Catarina 250
                        <br>
                        Porto
                    </p>
                    <p>+351 912 345 678</p>
                    <p>contacto@macaudouro.pt </p>
                </div>
                <div class="col-lg-3">
                    <h5>Horário</h5>
                    <p>
                        Segunda a Quinta
                        <br>
                        12:00 - 22:30
                    </p>
                    <p>
                        Sexta a Domingo
                        <br>
                        12:00 - 23:30
                    </p>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p> © 2026 Macau d'Ouro • Todos os direitos reservados.</p>
                <div class="social">
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">TikTok</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>