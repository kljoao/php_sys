-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/03/2024 às 20:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranet_empresas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) NOT NULL,
  `ramal` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `pa` varchar(255) NOT NULL,
  `acesso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `senha`, `cpf`, `ramal`, `setor`, `pa`, `acesso`) VALUES
(1, 'João Luis Bernardo', 'joao.bernardo@sicoob.com.br', '(21) 96486-5400', 'Sicoob@4327', '18831030701', '1619', 'Tecnologia', 'Sede', '1'),
(2, 'Alan Martins', 'alan.martins@sicoob.com.br', '(21) 99101-9948', NULL, '07485133705', '1645', 'Produto', 'Américas', '0'),
(3, 'Marcus Freitas', 'marcus.freitas@sicoob.com.br', '(21) 96587-7103', NULL, '98822420730', '1626', 'Crédito', 'Sede', '0'),
(4, 'Marcio Lambranho', 'marcio.lambranho@sicoob.com.br', '(21) 99468-2396', NULL, '02136291785', '1614', 'Cadastro', 'Sede', '0');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
