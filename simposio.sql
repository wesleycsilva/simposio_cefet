-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24-Jun-2019 às 15:27
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simposio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL COMMENT 'A = Ativo\nI = Inativo',
  `senha` varchar(100) NOT NULL,
  `situacao` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `idSimposio` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `informacoes` text NOT NULL,
  `local` varchar(45) NOT NULL,
  `qtdInscritos` int(11) NOT NULL,
  `qdtTotal` int(11) DEFAULT NULL,
  `dataHoraInicio` datetime NOT NULL,
  `dataHoraFinal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `idInscricao` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idSimposista` int(11) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT '0 = Cadastrado (ativo)\n1 = Pendente\n2 = Confirmado\n3 = Inativo\n4 = Presente\n5 = Ausente',
  `urlQrCode` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrante`
--

CREATE TABLE `palestrante` (
  `idPalestrante` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `urlFoto` varchar(100) DEFAULT NULL,
  `informacoes` text,
  `observcoes` varchar(200) DEFAULT NULL,
  `situacao` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `simposio`
--

CREATE TABLE `simposio` (
  `idSimposio` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `dataInicial` date NOT NULL,
  `dataFinal` date NOT NULL,
  `local` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `simposista`
--

CREATE TABLE `simposista` (
  `idSimposista` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `senha` varchar(100) NOT NULL,
  `situacao` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Ativo\n = Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`,`idSimposio`),
  ADD KEY `fk_evento_simposio1_idx` (`idSimposio`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`idInscricao`,`idEvento`,`idSimposista`),
  ADD KEY `fk_inscricao_evento_idx` (`idEvento`),
  ADD KEY `fk_inscricao_simposista1_idx` (`idSimposista`);

--
-- Indexes for table `palestrante`
--
ALTER TABLE `palestrante`
  ADD PRIMARY KEY (`idPalestrante`,`idEvento`),
  ADD KEY `fk_palestrante_evento1_idx` (`idEvento`);

--
-- Indexes for table `simposio`
--
ALTER TABLE `simposio`
  ADD PRIMARY KEY (`idSimposio`);

--
-- Indexes for table `simposista`
--
ALTER TABLE `simposista`
  ADD PRIMARY KEY (`idSimposista`),
  ADD UNIQUE KEY `matricula_UNIQUE` (`matricula`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `palestrante`
--
ALTER TABLE `palestrante`
  MODIFY `idPalestrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simposista`
--
ALTER TABLE `simposista`
  MODIFY `idSimposista` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_simposio1` FOREIGN KEY (`idSimposio`) REFERENCES `simposio` (`idSimposio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_inscricao_evento` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscricao_simposista1` FOREIGN KEY (`idSimposista`) REFERENCES `simposista` (`idSimposista`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `palestrante`
--
ALTER TABLE `palestrante`
  ADD CONSTRAINT `fk_palestrante_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
