-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Jul-2026 às 23:13
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `macau_douro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `utilizador` varchar(100) NOT NULL,
  `password_hash` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `utilizador`, `password_hash`) VALUES
(1, 'miguel_almeida', 'chefmiguel26'),
(2, 'ana_lei', 'chefana26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `preco_eur` decimal(6,2) NOT NULL,
  `preco_mop` decimal(6,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `categoria`, `nome`, `preco_eur`, `preco_mop`, `descricao`, `imagem`) VALUES
(1, 'Entradas', 'Pastéis de Bacalhau', 8.50, 78.00, NULL, NULL),
(2, 'Entradas', 'Dim Sum Artesanal', 9.90, 91.00, NULL, NULL),
(3, 'Entradas', 'Crepes de Camarão', 10.50, 97.00, NULL, NULL),
(4, 'Entradas', 'Tábua de Queijos Portugueses', 12.00, 110.00, NULL, NULL),
(5, 'Sopas', 'Canja Macaense', 7.50, 69.00, NULL, NULL),
(6, 'Sopas', 'Creme de Legumes', 6.90, 63.00, NULL, NULL),
(7, 'Sopas', 'Sopa de Marisco', 9.50, 87.00, NULL, NULL),
(8, 'Pratos Principais', 'Minchi', 18.90, 174.00, NULL, NULL),
(9, 'Pratos Principais', 'Galinha Africana', 21.50, 198.00, NULL, NULL),
(10, 'Pratos Principais', 'Tacho Macaense', 26.00, 239.00, NULL, NULL),
(11, 'Pratos Principais', 'Arroz Chau-Chau', 17.50, 161.00, NULL, NULL),
(12, 'Pratos Principais', 'Pato Assado com Molho Oriental', 24.50, 225.00, NULL, NULL),
(13, 'Pratos Principais', 'Bacalhau à Macau', 22.90, 211.00, NULL, NULL),
(14, 'Pratos Principais', 'Camarão ao Tamarindo', 24.90, 229.00, NULL, NULL),
(15, 'Pratos Principais', 'Lombo de Novilho com Molho de Pimenta', 28.50, 262.00, NULL, NULL),
(16, 'Sobremesas', 'Serradura', 7.50, 69.00, NULL, NULL),
(17, 'Sobremesas', 'Pastel de Nata', 3.20, 29.00, NULL, NULL),
(18, 'Sobremesas', 'Pudim Abade de Priscos', 6.50, 60.00, NULL, NULL),
(19, 'Sobremesas', 'Mousse de Chocolate', 6.00, 55.00, NULL, NULL),
(20, 'Sobremesas', 'Bolo de Amêndoa', 5.90, 54.00, NULL, NULL),
(21, 'Bebidas', 'Água Mineral', 2.20, 20.00, NULL, NULL),
(22, 'Bebidas', 'Refrigerantes', 2.80, 26.00, NULL, NULL),
(23, 'Bebidas', 'Chá de Jasmim', 3.80, 35.00, NULL, NULL),
(24, 'Bebidas', 'Café Expresso', 2.00, 18.00, NULL, NULL),
(25, 'Bebidas', 'Vinho do Porto (Copo)', 5.90, 54.00, NULL, NULL),
(26, 'Bebidas', 'Vinho da Casa (Garrafa)', 19.50, 179.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pessoas` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `pedidos` text NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('Pendente','Aceite','Cancelada') DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `nome`, `telefone`, `email`, `pessoas`, `data`, `hora`, `motivo`, `pedidos`, `criado`, `estado`) VALUES
(1, 'ee', '910930312', 's@gmail.com', 2, '2026-07-10', '14:00:00', 'Almoço', '', '2026-07-14 20:38:53', 'Aceite'),
(2, 'joana', '919991042', 'joana@icloud.com', 6, '2026-07-15', '14:00:00', 'Almoço', '', '2026-07-14 20:45:32', 'Aceite'),
(3, 'maria', '919991042', 'maria@icloud.com', 1, '2026-07-15', '14:30:00', 'Almoço', 'alho', '2026-07-14 20:36:30', 'Pendente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
