-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2022 às 22:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_byte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `nome_email` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id`, `nome_email`, `email`, `usuario_id`) VALUES
(73, 'Josefa', 'josefa@gmail.com', 67),
(77, 'Leticia Pereira Fernandes', 'leticia@gmail.com', 2),
(78, 'Beto', 'roberto@gmail.com', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `logradouro` varchar(220) NOT NULL,
  `numero` varchar(40) NOT NULL,
  `complemento` varchar(220) NOT NULL,
  `bairro` varchar(220) NOT NULL,
  `cidade` varchar(220) NOT NULL,
  `estado` varchar(220) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `titulo`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `usuario_id`) VALUES
(45, 'Sei lá', 'Rua da Sulentas', '560', 'Plantas', 'Viva as plantas', 'Maringá', 'Paraná', '15863254', 67),
(49, 'Sei lá', 'rua josefina', '760', 'Azul', 'Lumoeiros', 'Maringa', 'Paraná', '87043-212', 2),
(50, 'Sei lá', 'rua Beto', '78', 'Branco', 'Lumoeiros', 'Maringá', 'Paraná', '13131-870', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `nome_telefone` varchar(220) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `operadora` varchar(40) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `nome_telefone`, `telefone`, `operadora`, `usuario_id`) VALUES
(73, 'Katia', '(44) 99489-1056', 'Vivo', 67),
(77, 'Leticia ', '(44) 94545-1052', 'Vivo', 2),
(78, 'Roberto', '(44) 98908-2015', 'Oi', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome_mae` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `rg`, `cpf`, `nome_mae`, `created`, `modified`) VALUES
(2, 'Leticia Pereira Fernandes', 145665520, 785523621, 'Elirani Aparecida Pereira Fernandes', '2022-06-16 17:53:15', '0000-00-00 00:00:00'),
(4, 'stefanie pereira fernandes', 456465413, 464984684, 'Elirani Aparecida Pereira Fernandes', '2022-06-16 19:03:52', '0000-00-00 00:00:00'),
(6, 'Elirani Aparecida Pereira Fernandes', 125663254, 584660221, 'Floripes Maria Coelho Pereira', '2022-06-16 20:02:39', '0000-00-00 00:00:00'),
(54, 'Roberto José de Freitas Fernandes', 105145640, 10528458, 'Nice', '2022-06-19 14:45:47', '2022-06-25 16:56:06'),
(67, 'Yeviye', 1400800, 55546541, 'Jaimina', '2022-06-25 12:38:12', '2022-06-25 16:48:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_email_usuarios` (`usuario_id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_telefone_usuarios` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_email_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `FK_enderecos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `FK_telefone_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
