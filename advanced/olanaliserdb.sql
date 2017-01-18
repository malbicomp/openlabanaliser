-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 18/01/2017 às 15:15
-- Versão do servidor: 5.7.16-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.14-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `olanaliserdb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campodump`
--

CREATE TABLE `campodump` (
  `id` int(11) NOT NULL,
  `idDump` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `campofisicodump` int(11) NOT NULL,
  `tipodump` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dadosdump`
--

CREATE TABLE `dadosdump` (
  `id` bigint(20) NOT NULL,
  `iddumpfk` int(11) NOT NULL,
  `campo1` varchar(100),
  `campo2` varchar(100),
  `campo3` varchar(100),
  `campo4` varchar(100),
  `campo5` varchar(100),
  `campo6` varchar(100),
  `campo7` varchar(100),
  `campo8` varchar(100),
  `campo9` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dump`
--

CREATE TABLE `dump` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura para tabela `grafico`
--

CREATE TABLE `grafico` (
  `id` int(11) NOT NULL,
  `idindicador` int(11) NOT NULL,
  `idtipografico` int(11) NOT NULL,
  `multiplot` char(1) NOT NULL,
  `pseudocampoidentidade` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `graficotipo`
--

CREATE TABLE `graficotipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `indicador`
--

CREATE TABLE `indicador` (
  `id` int(11) NOT NULL,
  `iddump` int(11) NOT NULL,
  `idindicadortipo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `indicadortipo`
--

CREATE TABLE `indicadortipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `consultasql` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mapeamentopseudocampo`
--

CREATE TABLE `mapeamentopseudocampo` (
  `id` int(11) NOT NULL,
  `idindicador` int(11) NOT NULL,
  `idcampodump` int(11) NOT NULL,
  `idpseudocampo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1482113102),
('m130524_201442_init', 1482113113);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pseudocampo`
--

CREATE TABLE `pseudocampo` (
  `id` int(11) NOT NULL,
  `idindicadortipo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `administrador` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professor` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aluno` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `nome`, `cpf`, `administrador`, `professor`, `aluno`) VALUES
(1, 'malb', 'ZfEWJOn178KU6qBqhaNyVOnpqnBcl8Za', '$2y$13$caoX9kEiGzE6FoON9dx4D.WmzxpUmNr.fAvLhmIDRNwBaovSMMH..', NULL, 'malb@icomp.ufam.edu.br', 10, 1482113966, 1482113966, '', '', '', '', ''),
(2, 'fabricio', 'J-crr4L1WNNteLgGMayjJ34ifMG3FURy', '$2y$13$1O5xsqVrkLGhfZW2cwVUDe7EMiaw2SQdjJdI8PshgXxBC3S6Rl366', NULL, 'fabriciolima31@gmail.com', 10, 1484759916, 1484759916, 'Fabrício Lima', '123456', NULL, NULL, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `campodump`
--
ALTER TABLE `campodump`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDump` (`idDump`);

--
-- Índices de tabela `dadosdump`
--
ALTER TABLE `dadosdump`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddumpfk` (`iddumpfk`);

--
-- Índices de tabela `dump`
--
ALTER TABLE `dump`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grafico`
--
ALTER TABLE `grafico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idindicador` (`idindicador`),
  ADD KEY `pseudocampoidentidade` (`pseudocampoidentidade`),
  ADD KEY `x` (`x`),
  ADD KEY `y` (`y`),
  ADD KEY `z` (`z`),
  ADD KEY `idtipografico` (`idtipografico`);

--
-- Índices de tabela `graficotipo`
--
ALTER TABLE `graficotipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddump` (`iddump`),
  ADD KEY `idindicadortipo` (`idindicadortipo`);

--
-- Índices de tabela `indicadortipo`
--
ALTER TABLE `indicadortipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcampodump` (`idcampodump`),
  ADD KEY `idpseudocampo` (`idpseudocampo`),
  ADD KEY `idindicador` (`idindicador`);

--
-- Índices de tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices de tabela `pseudocampo`
--
ALTER TABLE `pseudocampo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idindicadortipo` (`idindicadortipo`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `campodump`
--
ALTER TABLE `campodump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dadosdump`
--
ALTER TABLE `dadosdump`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT de tabela `dump`
--
ALTER TABLE `dump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de tabela `grafico`
--
ALTER TABLE `grafico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `graficotipo`
--
ALTER TABLE `graficotipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `indicador`
--
ALTER TABLE `indicador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `indicadortipo`
--
ALTER TABLE `indicadortipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pseudocampo`
--
ALTER TABLE `pseudocampo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `campodump`
--
ALTER TABLE `campodump`
  ADD CONSTRAINT `camposiddumpfk` FOREIGN KEY (`idDump`) REFERENCES `dump` (`id`);

--
-- Restrições para tabelas `dadosdump`
--
ALTER TABLE `dadosdump`
  ADD CONSTRAINT `dadosiddumpfk` FOREIGN KEY (`iddumpfk`) REFERENCES `dump` (`id`);

--
-- Restrições para tabelas `grafico`
--
ALTER TABLE `grafico`
  ADD CONSTRAINT `graficoidindicadorfk` FOREIGN KEY (`idindicador`) REFERENCES `indicador` (`id`),
  ADD CONSTRAINT `graficoidtipofk` FOREIGN KEY (`idtipografico`) REFERENCES `graficotipo` (`id`),
  ADD CONSTRAINT `graficopseudocampofk` FOREIGN KEY (`pseudocampoidentidade`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofkx` FOREIGN KEY (`x`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofky` FOREIGN KEY (`y`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofkz` FOREIGN KEY (`z`) REFERENCES `pseudocampo` (`id`);

--
-- Restrições para tabelas `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicadoriddumpfk` FOREIGN KEY (`iddump`) REFERENCES `dump` (`id`),
  ADD CONSTRAINT `indicadoridindicadortipofk` FOREIGN KEY (`idindicadortipo`) REFERENCES `indicador` (`id`);

--
-- Restrições para tabelas `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  ADD CONSTRAINT `mapidcampodumpfk` FOREIGN KEY (`idcampodump`) REFERENCES `campodump` (`id`),
  ADD CONSTRAINT `mapidindicadorfk` FOREIGN KEY (`idindicador`) REFERENCES `indicador` (`id`),
  ADD CONSTRAINT `mapidpseudocampofk` FOREIGN KEY (`idpseudocampo`) REFERENCES `pseudocampo` (`id`);

--
-- Restrições para tabelas `pseudocampo`
--
ALTER TABLE `pseudocampo`
  ADD CONSTRAINT `pseudoidindicadortipofk` FOREIGN KEY (`idindicadortipo`) REFERENCES `indicadortipo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
