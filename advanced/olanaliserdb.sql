-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2016 at 06:49 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olanaliserdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `campodump`
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
-- Table structure for table `dadosdump`
--

CREATE TABLE `dadosdump` (
  `id` bigint(20) NOT NULL,
  `iddumpfk` int(11) NOT NULL,
  `campo1` varchar(100) NOT NULL,
  `campo2` varchar(100) NOT NULL,
  `campo3` varchar(100) NOT NULL,
  `campo4` varchar(100) NOT NULL,
  `campo5` varchar(100) NOT NULL,
  `campo6` varchar(100) NOT NULL,
  `campo7` varchar(100) NOT NULL,
  `campo8` varchar(100) NOT NULL,
  `campo9` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dump`
--

CREATE TABLE `dump` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grafico`
--

CREATE TABLE `grafico` (
  `id` int(11) NOT NULL,
  `idindicador` int(11) NOT NULL,
  `idtipografico` int(11) NOT NULL,
  `multiplot` char(1) NOT NULL,
  `pseudocampoidentidade` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `graficotipo`
--

CREATE TABLE `graficotipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indicador`
--

CREATE TABLE `indicador` (
  `id` int(11) NOT NULL,
  `iddump` int(11) NOT NULL,
  `idindicadortipo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indicadortipo`
--

CREATE TABLE `indicadortipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `consultasql` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mapeamentopseudocampo`
--

CREATE TABLE `mapeamentopseudocampo` (
  `id` int(11) NOT NULL,
  `idindicador` int(11) NOT NULL,
  `idcampodump` int(11) NOT NULL,
  `idpseudocampo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1482113102),
('m130524_201442_init', 1482113113);

-- --------------------------------------------------------

--
-- Table structure for table `pseudocampo`
--

CREATE TABLE `pseudocampo` (
  `id` int(11) NOT NULL,
  `idindicadortipo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  `administrador` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `professor` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `aluno` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `nome`, `cpf`, `administrador`, `professor`, `aluno`) VALUES
(1, 'malb', 'ZfEWJOn178KU6qBqhaNyVOnpqnBcl8Za', '$2y$13$caoX9kEiGzE6FoON9dx4D.WmzxpUmNr.fAvLhmIDRNwBaovSMMH..', NULL, 'malb@icomp.ufam.edu.br', 10, 1482113966, 1482113966, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campodump`
--
ALTER TABLE `campodump`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDump` (`idDump`);

--
-- Indexes for table `dadosdump`
--
ALTER TABLE `dadosdump`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddumpfk` (`iddumpfk`);

--
-- Indexes for table `dump`
--
ALTER TABLE `dump`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grafico`
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
-- Indexes for table `graficotipo`
--
ALTER TABLE `graficotipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddump` (`iddump`),
  ADD KEY `idindicadortipo` (`idindicadortipo`);

--
-- Indexes for table `indicadortipo`
--
ALTER TABLE `indicadortipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcampodump` (`idcampodump`),
  ADD KEY `idpseudocampo` (`idpseudocampo`),
  ADD KEY `idindicador` (`idindicador`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pseudocampo`
--
ALTER TABLE `pseudocampo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idindicadortipo` (`idindicadortipo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campodump`
--
ALTER TABLE `campodump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dadosdump`
--
ALTER TABLE `dadosdump`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dump`
--
ALTER TABLE `dump`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grafico`
--
ALTER TABLE `grafico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `graficotipo`
--
ALTER TABLE `graficotipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indicador`
--
ALTER TABLE `indicador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indicadortipo`
--
ALTER TABLE `indicadortipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pseudocampo`
--
ALTER TABLE `pseudocampo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `campodump`
--
ALTER TABLE `campodump`
  ADD CONSTRAINT `camposiddumpfk` FOREIGN KEY (`idDump`) REFERENCES `dump` (`id`);

--
-- Constraints for table `dadosdump`
--
ALTER TABLE `dadosdump`
  ADD CONSTRAINT `dadosiddumpfk` FOREIGN KEY (`iddumpfk`) REFERENCES `dump` (`id`);

--
-- Constraints for table `grafico`
--
ALTER TABLE `grafico`
  ADD CONSTRAINT `graficoidindicadorfk` FOREIGN KEY (`idindicador`) REFERENCES `indicador` (`id`),
  ADD CONSTRAINT `graficoidtipofk` FOREIGN KEY (`idtipografico`) REFERENCES `graficotipo` (`id`),
  ADD CONSTRAINT `graficopseudocampofk` FOREIGN KEY (`pseudocampoidentidade`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofkx` FOREIGN KEY (`x`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofky` FOREIGN KEY (`y`) REFERENCES `pseudocampo` (`id`),
  ADD CONSTRAINT `graficopseudocampofkz` FOREIGN KEY (`z`) REFERENCES `pseudocampo` (`id`);

--
-- Constraints for table `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicadoriddumpfk` FOREIGN KEY (`iddump`) REFERENCES `dump` (`id`),
  ADD CONSTRAINT `indicadoridindicadortipofk` FOREIGN KEY (`idindicadortipo`) REFERENCES `indicador` (`id`);

--
-- Constraints for table `mapeamentopseudocampo`
--
ALTER TABLE `mapeamentopseudocampo`
  ADD CONSTRAINT `mapidcampodumpfk` FOREIGN KEY (`idcampodump`) REFERENCES `campodump` (`id`),
  ADD CONSTRAINT `mapidindicadorfk` FOREIGN KEY (`idindicador`) REFERENCES `indicador` (`id`),
  ADD CONSTRAINT `mapidpseudocampofk` FOREIGN KEY (`idpseudocampo`) REFERENCES `pseudocampo` (`id`);

--
-- Constraints for table `pseudocampo`
--
ALTER TABLE `pseudocampo`
  ADD CONSTRAINT `pseudoidindicadortipofk` FOREIGN KEY (`idindicadortipo`) REFERENCES `indicadortipo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
