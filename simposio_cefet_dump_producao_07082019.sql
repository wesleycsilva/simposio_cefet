-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 186.202.152.69
-- Generation Time: 07-Ago-2019 às 09:36
-- Versão do servidor: 5.6.40-84.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simposio_cefet`
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
  `local` varchar(200) NOT NULL,
  `qtdInscritos` int(11) NOT NULL,
  `qtdTotal` int(11) NOT NULL,
  `dataHoraInicio` datetime NOT NULL,
  `dataHoraFinal` datetime NOT NULL,
  `qtdInscritosExternos` int(11) NOT NULL,
  `qtdTotalExternos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idEvento`, `idSimposio`, `titulo`, `descricao`, `data`, `informacoes`, `local`, `qtdInscritos`, `qtdTotal`, `dataHoraInicio`, `dataHoraFinal`, `qtdInscritosExternos`, `qtdTotalExternos`) VALUES
(1, 1, 'Palestra 1', 'Construções Pré-Colombianas das Américas', '2019-08-08', 'Prof. José Celso da Cunha - Engenheiro civil e escritor no âmbito de engenharia e arquitetura', 'Anfiteatro do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 138, 140, '2019-08-08 19:00:00', '2019-08-08 20:10:00', 3, 10),
(2, 1, 'Palestra 2', 'Concreto Reforçado com Fibras de Aço: Propriedades, Aplicações e Perspectivas para o Futuro', '2019-08-08', 'Eng. Romário de Souza Lima - Belgo Bekaert Arames', 'Anfiteatro do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 134, 140, '2019-08-08 20:30:00', '2019-08-08 21:40:00', 3, 10),
(3, 1, 'Visita Técnica 1', '', '2019-08-09', 'Pedreira Santo Antônio', 'Hall da Biblioteca do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 24, 40, '2019-08-09 13:00:00', '2019-08-09 15:30:00', 2, 5),
(4, 1, 'Visita Técnica 2', '', '2019-08-09', 'ECOVIA – Reciclagem de Resíduos da Construção Civil Ltda', 'Hall da Biblioteca do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 32, 40, '2019-08-09 14:00:00', '2019-08-09 16:30:00', 1, 5),
(5, 1, 'Palestra 1', 'Inovações, Tecnologia e Sustentabilidade nas Construções em Madeira', '2019-08-09', 'Prof. Francisco Carlos Gomes - Universidade Federal de Lavras (UFLA)', 'Anfiteatro do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 133, 140, '2019-08-09 19:00:00', '2019-08-09 20:10:00', 3, 10),
(6, 1, 'Palestra 2', 'Resíduos Agroindustriais para a Produção de Cimentos de Baixo Impacto Ambiental', '2019-08-09', 'Prof. Conrado de Souza Rodrigues - Centro Federal de Educação Tecnológica de Minas Gerais (CEFETMG)', 'Anfiteatro do Centro Federal de Educação Tecnológico de Minas Gerais, CEFETMG, Campus Varginha.', 133, 140, '2019-08-09 20:30:00', '2019-08-09 21:40:00', 3, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `idInscricao` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idSimposista` int(11) NOT NULL,
  `situacao` char(1) NOT NULL COMMENT '1 = Cadastrado\n2 = Cancelado\n3 = Presente\n4 = Ausente\n5 = Inativo',
  `urlQrCode` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`idInscricao`, `idEvento`, `idSimposista`, `situacao`, `urlQrCode`) VALUES
(1, 1, 9, '1', NULL),
(2, 2, 9, '1', NULL),
(3, 5, 9, '1', NULL),
(4, 6, 9, '1', NULL),
(5, 1, 13, '1', NULL),
(6, 2, 13, '1', NULL),
(7, 3, 13, '1', NULL),
(8, 4, 13, '1', NULL),
(9, 5, 13, '1', NULL),
(10, 6, 13, '1', NULL),
(11, 1, 12, '1', NULL),
(12, 2, 12, '1', NULL),
(13, 4, 12, '1', NULL),
(14, 5, 12, '1', NULL),
(15, 6, 12, '1', NULL),
(16, 1, 14, '1', NULL),
(17, 2, 14, '1', NULL),
(18, 3, 14, '2', NULL),
(19, 4, 14, '1', NULL),
(20, 5, 14, '1', NULL),
(21, 6, 14, '1', NULL),
(22, 1, 15, '1', NULL),
(23, 2, 15, '1', NULL),
(24, 3, 15, '2', NULL),
(25, 4, 15, '1', NULL),
(26, 5, 15, '1', NULL),
(27, 6, 15, '1', NULL),
(28, 1, 17, '1', NULL),
(29, 2, 17, '1', NULL),
(30, 3, 17, '2', NULL),
(31, 4, 17, '1', NULL),
(32, 4, 17, '1', NULL),
(33, 5, 17, '1', NULL),
(34, 6, 17, '1', NULL),
(35, 1, 16, '1', NULL),
(36, 2, 16, '1', NULL),
(37, 4, 16, '1', NULL),
(38, 5, 16, '1', NULL),
(39, 6, 16, '1', NULL),
(40, 3, 22, '1', NULL),
(41, 6, 22, '1', NULL),
(42, 5, 22, '1', NULL),
(43, 1, 22, '1', NULL),
(44, 2, 22, '1', NULL),
(45, 1, 25, '1', NULL),
(46, 2, 25, '1', NULL),
(47, 5, 25, '1', NULL),
(48, 6, 25, '1', NULL),
(49, 1, 27, '1', NULL),
(50, 2, 27, '1', NULL),
(51, 5, 27, '1', NULL),
(52, 4, 27, '1', NULL),
(53, 1, 28, '1', NULL),
(54, 2, 28, '1', NULL),
(55, 5, 28, '1', NULL),
(56, 6, 28, '1', NULL),
(57, 3, 28, '2', NULL),
(58, 1, 29, '1', NULL),
(59, 2, 29, '1', NULL),
(61, 5, 29, '1', NULL),
(62, 6, 29, '1', NULL),
(63, 1, 31, '1', NULL),
(64, 2, 31, '1', NULL),
(65, 5, 31, '1', NULL),
(66, 6, 31, '1', NULL),
(67, 3, 31, '1', NULL),
(68, 1, 34, '1', NULL),
(69, 2, 34, '1', NULL),
(70, 5, 34, '1', NULL),
(71, 6, 34, '1', NULL),
(72, 1, 36, '1', NULL),
(73, 2, 36, '1', NULL),
(74, 3, 36, '1', NULL),
(75, 4, 36, '2', NULL),
(76, 6, 36, '1', NULL),
(77, 5, 36, '1', NULL),
(78, 1, 38, '1', NULL),
(79, 2, 38, '1', NULL),
(80, 3, 38, '1', NULL),
(81, 5, 38, '1', NULL),
(82, 6, 38, '1', NULL),
(83, 1, 39, '1', NULL),
(84, 2, 39, '1', NULL),
(85, 5, 39, '1', NULL),
(86, 6, 39, '1', NULL),
(87, 1, 23, '1', NULL),
(88, 2, 23, '1', NULL),
(89, 3, 23, '1', NULL),
(90, 5, 23, '1', NULL),
(91, 6, 23, '1', NULL),
(92, 1, 40, '1', NULL),
(93, 2, 40, '1', NULL),
(94, 4, 40, '2', NULL),
(95, 5, 40, '1', NULL),
(96, 6, 40, '1', NULL),
(97, 6, 40, '1', NULL),
(98, 6, 40, '1', NULL),
(99, 1, 41, '1', NULL),
(100, 2, 41, '1', NULL),
(101, 3, 41, '1', NULL),
(102, 5, 41, '1', NULL),
(103, 6, 41, '1', NULL),
(104, 1, 42, '1', NULL),
(105, 3, 42, '1', NULL),
(106, 5, 42, '1', NULL),
(107, 6, 42, '1', NULL),
(108, 6, 46, '1', NULL),
(109, 5, 46, '1', NULL),
(110, 4, 46, '1', NULL),
(111, 1, 46, '1', NULL),
(112, 2, 46, '1', NULL),
(113, 1, 26, '1', NULL),
(114, 6, 26, '1', NULL),
(115, 6, 26, '1', NULL),
(116, 2, 26, '1', NULL),
(117, 3, 26, '1', NULL),
(118, 4, 26, '2', NULL),
(119, 5, 26, '1', NULL),
(120, 1, 47, '1', NULL),
(121, 2, 47, '1', NULL),
(122, 3, 47, '1', NULL),
(123, 5, 47, '1', NULL),
(124, 6, 47, '1', NULL),
(125, 1, 43, '1', NULL),
(126, 3, 43, '1', NULL),
(127, 2, 43, '1', NULL),
(128, 5, 43, '1', NULL),
(129, 6, 43, '1', NULL),
(130, 1, 48, '1', NULL),
(131, 2, 48, '1', NULL),
(132, 3, 48, '1', NULL),
(133, 5, 48, '1', NULL),
(134, 6, 48, '1', NULL),
(135, 1, 8, '1', NULL),
(136, 2, 8, '1', NULL),
(137, 4, 8, '1', NULL),
(138, 5, 8, '1', NULL),
(139, 6, 8, '1', NULL),
(140, 1, 18, '1', NULL),
(141, 2, 18, '1', NULL),
(142, 5, 18, '1', NULL),
(143, 6, 18, '1', NULL),
(144, 1, 51, '1', NULL),
(145, 2, 51, '1', NULL),
(146, 3, 51, '1', NULL),
(147, 4, 51, '1', NULL),
(148, 4, 51, '1', NULL),
(149, 5, 51, '1', NULL),
(150, 6, 51, '1', NULL),
(151, 1, 54, '1', NULL),
(152, 2, 54, '1', NULL),
(153, 4, 54, '1', NULL),
(154, 5, 54, '1', NULL),
(155, 6, 54, '1', NULL),
(156, 1, 52, '1', NULL),
(157, 2, 52, '1', NULL),
(158, 5, 52, '1', NULL),
(159, 6, 52, '1', NULL),
(160, 1, 56, '1', NULL),
(161, 2, 56, '1', NULL),
(162, 3, 56, '1', NULL),
(163, 5, 56, '1', NULL),
(164, 6, 56, '1', NULL),
(165, 1, 57, '1', NULL),
(166, 2, 57, '1', NULL),
(167, 5, 57, '1', NULL),
(168, 5, 57, '1', NULL),
(169, 6, 57, '1', NULL),
(170, 1, 59, '1', NULL),
(171, 2, 59, '1', NULL),
(172, 3, 59, '2', NULL),
(173, 1, 61, '1', NULL),
(174, 1, 62, '1', NULL),
(175, 2, 61, '1', NULL),
(176, 2, 62, '1', NULL),
(177, 3, 62, '2', NULL),
(178, 4, 62, '1', NULL),
(179, 5, 61, '1', NULL),
(180, 6, 61, '1', NULL),
(181, 5, 62, '1', NULL),
(182, 6, 62, '1', NULL),
(183, 1, 64, '1', NULL),
(184, 2, 64, '1', NULL),
(185, 3, 64, '1', NULL),
(186, 4, 64, '2', NULL),
(187, 5, 64, '1', NULL),
(188, 6, 64, '1', NULL),
(189, 1, 65, '1', NULL),
(190, 2, 65, '1', NULL),
(191, 5, 65, '1', NULL),
(192, 6, 65, '1', NULL),
(193, 1, 66, '1', NULL),
(194, 2, 66, '1', NULL),
(195, 3, 66, '2', NULL),
(196, 4, 66, '1', NULL),
(197, 5, 66, '1', NULL),
(198, 6, 66, '1', NULL),
(199, 1, 63, '1', NULL),
(200, 2, 63, '1', NULL),
(201, 3, 63, '1', NULL),
(202, 5, 63, '1', NULL),
(203, 6, 63, '1', NULL),
(204, 1, 67, '1', NULL),
(205, 2, 67, '1', NULL),
(206, 4, 67, '1', NULL),
(207, 5, 67, '1', NULL),
(208, 6, 67, '1', NULL),
(209, 1, 58, '1', NULL),
(210, 2, 58, '1', NULL),
(211, 4, 58, '1', NULL),
(212, 5, 58, '1', NULL),
(213, 6, 58, '1', NULL),
(214, 1, 68, '1', NULL),
(215, 2, 68, '1', NULL),
(216, 3, 68, '1', NULL),
(217, 5, 68, '1', NULL),
(218, 6, 68, '1', NULL),
(219, 1, 69, '1', NULL),
(220, 2, 69, '1', NULL),
(221, 4, 69, '1', NULL),
(222, 5, 69, '1', NULL),
(223, 6, 69, '1', NULL),
(224, 1, 70, '1', NULL),
(225, 2, 70, '1', NULL),
(226, 5, 70, '1', NULL),
(227, 6, 70, '1', NULL),
(228, 1, 71, '1', NULL),
(229, 2, 71, '1', NULL),
(230, 3, 71, '1', NULL),
(231, 5, 71, '1', NULL),
(232, 6, 71, '1', NULL),
(233, 1, 72, '1', NULL),
(234, 2, 72, '1', NULL),
(235, 3, 72, '2', NULL),
(236, 4, 72, '1', NULL),
(237, 5, 72, '1', NULL),
(238, 6, 72, '1', NULL),
(239, 1, 73, '1', NULL),
(240, 2, 73, '1', NULL),
(241, 5, 73, '1', NULL),
(242, 6, 73, '1', NULL),
(243, 1, 75, '1', NULL),
(244, 1, 75, '1', NULL),
(245, 1, 75, '1', NULL),
(246, 1, 75, '1', NULL),
(247, 2, 75, '1', NULL),
(248, 5, 75, '1', NULL),
(249, 6, 75, '1', NULL),
(250, 1, 76, '1', NULL),
(251, 2, 76, '1', NULL),
(252, 4, 75, '1', NULL),
(253, 4, 76, '1', NULL),
(254, 5, 76, '1', NULL),
(255, 6, 76, '1', NULL),
(257, 1, 20, '1', NULL),
(258, 2, 20, '1', NULL),
(259, 5, 20, '1', NULL),
(260, 6, 20, '1', NULL),
(261, 4, 20, '2', NULL),
(262, 1, 30, '1', NULL),
(263, 2, 30, '1', NULL),
(264, 4, 30, '1', NULL),
(265, 5, 30, '1', NULL),
(266, 6, 30, '1', NULL),
(267, 1, 45, '1', NULL),
(268, 2, 45, '1', NULL),
(269, 3, 45, '1', NULL),
(270, 4, 45, '1', NULL),
(271, 5, 45, '1', NULL),
(272, 6, 45, '1', NULL),
(273, 1, 49, '1', NULL),
(274, 2, 49, '1', NULL),
(275, 5, 49, '1', NULL),
(276, 6, 49, '1', NULL),
(277, 3, 49, '1', NULL),
(278, 2, 19, '1', NULL),
(279, 3, 19, '1', NULL),
(280, 5, 19, '1', NULL),
(281, 1, 50, '1', NULL),
(282, 2, 50, '1', NULL),
(283, 3, 50, '1', NULL),
(284, 4, 50, '2', NULL),
(285, 5, 50, '1', NULL),
(286, 6, 50, '1', NULL),
(287, 1, 19, '1', NULL),
(288, 6, 19, '1', NULL),
(289, 1, 32, '1', NULL),
(290, 2, 32, '1', NULL),
(291, 4, 32, '1', NULL),
(292, 5, 32, '1', NULL),
(293, 6, 32, '1', NULL),
(294, 1, 24, '1', NULL),
(295, 2, 24, '1', NULL),
(296, 5, 24, '1', NULL),
(297, 6, 24, '1', NULL),
(298, 4, 24, '1', NULL),
(299, 1, 35, '1', NULL),
(300, 2, 35, '1', NULL),
(301, 4, 35, '1', NULL),
(302, 5, 35, '1', NULL),
(303, 6, 35, '1', NULL),
(304, 1, 33, '1', NULL),
(305, 2, 33, '1', NULL),
(306, 5, 33, '1', NULL),
(307, 6, 33, '1', NULL),
(308, 1, 44, '1', NULL),
(309, 2, 44, '1', NULL),
(310, 5, 44, '1', NULL),
(311, 6, 44, '1', NULL),
(312, 6, 59, '1', NULL),
(313, 4, 59, '1', NULL),
(314, 1, 80, '1', NULL),
(315, 2, 80, '1', NULL),
(316, 4, 80, '1', NULL),
(317, 5, 80, '1', NULL),
(318, 6, 80, '1', NULL),
(319, 1, 82, '1', NULL),
(320, 1, 82, '1', NULL),
(321, 2, 82, '1', NULL),
(322, 3, 82, '1', NULL),
(323, 5, 82, '1', NULL),
(324, 6, 82, '1', NULL),
(325, 1, 83, '1', NULL),
(326, 2, 83, '1', NULL),
(327, 2, 83, '1', NULL),
(328, 5, 83, '1', NULL),
(329, 6, 83, '1', NULL),
(330, 1, 85, '1', NULL),
(331, 2, 85, '1', NULL),
(332, 3, 85, '1', NULL),
(333, 5, 85, '1', NULL),
(334, 6, 85, '1', NULL),
(335, 5, 21, '1', NULL),
(336, 1, 87, '1', NULL),
(337, 2, 87, '1', NULL),
(338, 5, 87, '1', NULL),
(339, 6, 87, '1', NULL),
(340, 1, 55, '1', NULL),
(341, 2, 55, '1', NULL),
(342, 5, 55, '1', NULL),
(343, 6, 55, '1', NULL),
(344, 4, 55, '1', NULL),
(345, 1, 53, '1', NULL),
(346, 2, 53, '1', NULL),
(347, 4, 53, '1', NULL),
(348, 1, 88, '1', NULL),
(349, 5, 53, '1', NULL),
(350, 6, 53, '1', NULL),
(351, 2, 88, '1', NULL),
(352, 5, 88, '1', NULL),
(353, 6, 88, '1', NULL),
(354, 1, 89, '1', NULL),
(355, 2, 89, '1', NULL),
(356, 3, 89, '1', NULL),
(357, 4, 89, '1', NULL),
(358, 5, 89, '1', NULL),
(359, 6, 89, '1', NULL),
(360, 1, 90, '1', NULL),
(361, 5, 90, '1', NULL),
(362, 6, 90, '1', NULL),
(363, 2, 90, '1', NULL),
(364, 1, 91, '1', NULL),
(365, 2, 91, '1', NULL),
(366, 4, 91, '1', NULL),
(367, 5, 91, '1', NULL),
(368, 6, 91, '1', NULL),
(369, 1, 95, '1', NULL),
(370, 5, 95, '1', NULL),
(371, 1, 97, '1', NULL),
(372, 1, 96, '1', NULL),
(373, 2, 97, '1', NULL),
(374, 5, 97, '1', NULL),
(375, 6, 97, '1', NULL),
(376, 2, 96, '1', NULL),
(377, 5, 96, '1', NULL),
(378, 6, 96, '1', NULL),
(379, 2, 95, '1', NULL),
(380, 6, 95, '1', NULL),
(381, 1, 98, '1', NULL),
(382, 2, 98, '1', NULL),
(383, 4, 98, '1', NULL),
(384, 5, 98, '1', NULL),
(385, 6, 98, '1', NULL),
(386, 1, 94, '1', NULL),
(387, 2, 94, '1', NULL),
(388, 3, 94, '1', NULL),
(389, 1, 101, '1', NULL),
(390, 2, 101, '1', NULL),
(391, 5, 101, '1', NULL),
(392, 6, 101, '1', NULL),
(393, 1, 79, '1', NULL),
(394, 1, 78, '1', NULL),
(395, 1, 102, '1', NULL),
(396, 1, 93, '1', NULL),
(397, 1, 100, '1', NULL),
(398, 1, 103, '1', NULL),
(399, 1, 81, '1', NULL),
(400, 1, 74, '2', NULL),
(401, 1, 99, '1', NULL),
(402, 1, 84, '1', NULL),
(403, 1, 92, '1', NULL),
(404, 1, 86, '1', NULL),
(408, 2, 79, '1', NULL),
(409, 2, 78, '1', NULL),
(410, 2, 102, '1', NULL),
(411, 2, 93, '1', NULL),
(412, 2, 100, '1', NULL),
(413, 2, 103, '1', NULL),
(414, 2, 81, '1', NULL),
(415, 2, 74, '1', NULL),
(416, 2, 99, '1', NULL),
(417, 2, 84, '1', NULL),
(418, 2, 92, '1', NULL),
(419, 2, 86, '1', NULL),
(423, 5, 79, '1', NULL),
(424, 5, 78, '1', NULL),
(425, 5, 102, '1', NULL),
(426, 5, 93, '1', NULL),
(427, 5, 100, '1', NULL),
(428, 5, 103, '1', NULL),
(429, 5, 81, '1', NULL),
(430, 5, 74, '1', NULL),
(431, 5, 99, '1', NULL),
(432, 5, 84, '1', NULL),
(433, 5, 92, '1', NULL),
(434, 5, 86, '1', NULL),
(438, 6, 79, '1', NULL),
(439, 6, 78, '1', NULL),
(440, 6, 102, '1', NULL),
(441, 6, 93, '1', NULL),
(442, 6, 100, '1', NULL),
(443, 6, 103, '1', NULL),
(444, 6, 81, '1', NULL),
(445, 6, 74, '1', NULL),
(446, 6, 99, '1', NULL),
(447, 6, 84, '1', NULL),
(448, 6, 92, '1', NULL),
(449, 6, 86, '1', NULL),
(458, 1, 105, '1', NULL),
(459, 2, 105, '1', NULL),
(460, 5, 105, '1', NULL),
(461, 6, 105, '1', NULL),
(462, 1, 107, '1', NULL),
(463, 2, 107, '1', NULL),
(464, 5, 107, '1', NULL),
(465, 6, 107, '1', NULL),
(466, 1, 108, '1', NULL),
(467, 2, 108, '1', NULL),
(468, 5, 108, '1', NULL),
(469, 6, 108, '1', NULL),
(470, 1, 110, '1', NULL),
(471, 2, 110, '1', NULL),
(472, 5, 110, '1', NULL),
(473, 6, 110, '1', NULL),
(474, 1, 112, '1', NULL),
(475, 5, 112, '1', NULL),
(476, 2, 112, '1', NULL),
(477, 6, 112, '1', NULL),
(478, 1, 104, '1', NULL),
(479, 2, 104, '1', NULL),
(480, 5, 104, '1', NULL),
(481, 6, 104, '1', NULL),
(482, 1, 106, '1', NULL),
(483, 2, 106, '1', NULL),
(484, 5, 106, '1', NULL),
(485, 6, 106, '1', NULL),
(486, 6, 106, '1', NULL),
(487, 1, 114, '1', NULL),
(488, 2, 114, '1', NULL),
(489, 5, 114, '1', NULL),
(490, 6, 114, '1', NULL),
(491, 1, 115, '1', NULL),
(492, 1, 109, '1', NULL),
(493, 2, 115, '1', NULL),
(494, 5, 115, '1', NULL),
(495, 6, 115, '1', NULL),
(496, 2, 109, '1', NULL),
(497, 2, 109, '1', NULL),
(498, 5, 109, '1', NULL),
(499, 1, 118, '1', NULL),
(500, 2, 118, '1', NULL),
(501, 1, 120, '1', NULL),
(502, 2, 120, '1', NULL),
(503, 5, 118, '1', NULL),
(504, 5, 120, '1', NULL),
(505, 6, 120, '1', NULL),
(506, 6, 109, '1', NULL),
(507, 6, 118, '1', NULL),
(508, 1, 123, '1', NULL),
(509, 1, 122, '1', NULL),
(510, 2, 123, '1', NULL),
(511, 5, 123, '1', NULL),
(512, 2, 122, '1', NULL),
(513, 6, 123, '1', NULL),
(514, 5, 122, '1', NULL),
(515, 6, 122, '1', NULL),
(516, 2, 124, '1', NULL),
(517, 5, 124, '1', NULL),
(518, 6, 124, '1', NULL),
(519, 1, 126, '1', NULL),
(520, 2, 126, '1', NULL),
(521, 5, 126, '1', NULL),
(522, 6, 126, '1', NULL),
(523, 1, 125, '1', NULL),
(524, 2, 125, '1', NULL),
(525, 5, 125, '1', NULL),
(526, 6, 125, '1', NULL),
(527, 1, 128, '1', NULL),
(528, 2, 128, '1', NULL),
(529, 1, 129, '1', NULL),
(530, 2, 129, '1', NULL),
(531, 5, 129, '1', NULL),
(532, 6, 129, '1', NULL),
(533, 1, 130, '1', NULL),
(534, 2, 130, '1', NULL),
(535, 5, 130, '1', NULL),
(536, 6, 130, '1', NULL),
(537, 1, 131, '1', NULL),
(538, 2, 131, '1', NULL),
(539, 5, 131, '1', NULL),
(540, 6, 131, '1', NULL),
(541, 1, 132, '1', NULL),
(542, 2, 132, '1', NULL),
(543, 5, 132, '1', NULL),
(544, 6, 132, '1', NULL),
(545, 1, 133, '1', NULL),
(546, 2, 133, '1', NULL),
(547, 1, 111, '1', NULL),
(548, 5, 111, '1', NULL),
(549, 6, 111, '1', NULL),
(550, 1, 135, '1', NULL),
(551, 5, 135, '1', NULL),
(552, 6, 135, '1', NULL),
(553, 1, 136, '1', NULL),
(554, 5, 136, '1', NULL),
(555, 6, 136, '1', NULL),
(556, 1, 137, '1', NULL),
(557, 2, 137, '1', NULL),
(558, 5, 137, '1', NULL),
(559, 6, 137, '1', NULL),
(560, 1, 138, '1', NULL),
(561, 2, 138, '1', NULL),
(562, 5, 138, '1', NULL),
(563, 6, 138, '1', NULL),
(564, 1, 139, '1', NULL),
(565, 2, 139, '1', NULL),
(566, 5, 139, '1', NULL),
(567, 6, 139, '1', NULL),
(568, 1, 140, '1', NULL),
(569, 2, 140, '1', NULL),
(570, 5, 140, '1', NULL),
(571, 6, 140, '1', NULL),
(572, 1, 141, '1', NULL),
(573, 2, 141, '1', NULL),
(574, 5, 141, '1', NULL),
(575, 6, 141, '1', NULL),
(576, 1, 142, '1', NULL),
(577, 2, 142, '1', NULL),
(578, 5, 142, '1', NULL),
(579, 6, 142, '1', NULL),
(580, 1, 127, '1', NULL),
(581, 2, 127, '1', NULL),
(582, 5, 127, '1', NULL),
(583, 6, 127, '1', NULL),
(584, 1, 143, '1', NULL),
(585, 5, 143, '1', NULL),
(586, 6, 143, '1', NULL),
(587, 1, 145, '1', NULL),
(588, 2, 145, '1', NULL),
(589, 5, 145, '1', NULL),
(590, 1, 144, '1', NULL),
(591, 2, 144, '1', NULL),
(592, 5, 144, '1', NULL),
(593, 6, 144, '1', NULL),
(594, 2, 143, '1', NULL),
(595, 1, 146, '1', NULL),
(596, 2, 146, '1', NULL),
(597, 5, 146, '1', NULL),
(598, 1, 148, '1', NULL),
(599, 2, 148, '1', NULL),
(600, 1, 150, '1', NULL),
(601, 2, 150, '1', NULL),
(602, 5, 150, '1', NULL),
(603, 6, 150, '1', NULL),
(604, 1, 147, '1', NULL),
(605, 2, 147, '1', NULL),
(606, 5, 147, '1', NULL),
(607, 6, 147, '1', NULL),
(608, 1, 149, '1', NULL),
(609, 2, 149, '1', NULL),
(610, 5, 149, '1', NULL),
(611, 6, 149, '1', NULL),
(612, 1, 152, '1', NULL),
(613, 2, 152, '1', NULL),
(614, 5, 152, '1', NULL),
(615, 6, 152, '1', NULL),
(617, 1, 113, '1', NULL),
(618, 1, 116, '1', NULL),
(619, 1, 117, '1', NULL),
(620, 1, 119, '1', NULL),
(621, 1, 121, '1', NULL),
(622, 1, 134, '1', NULL),
(623, 1, 151, '1', NULL),
(624, 2, 113, '1', NULL),
(625, 2, 116, '1', NULL),
(626, 2, 117, '1', NULL),
(627, 2, 119, '1', NULL),
(628, 2, 121, '1', NULL),
(629, 2, 134, '1', NULL),
(630, 2, 151, '1', NULL),
(631, 5, 113, '1', NULL),
(632, 5, 116, '1', NULL),
(633, 5, 117, '1', NULL),
(634, 5, 119, '1', NULL),
(635, 5, 121, '1', NULL),
(636, 5, 134, '1', NULL),
(637, 5, 151, '1', NULL),
(638, 6, 113, '1', NULL),
(639, 6, 116, '1', NULL),
(640, 6, 117, '1', NULL),
(641, 6, 119, '1', NULL),
(642, 6, 121, '1', NULL),
(643, 6, 134, '1', NULL),
(644, 6, 151, '1', NULL),
(645, 1, 60, '2', NULL),
(646, 2, 60, '2', NULL),
(647, 6, 60, '2', NULL);

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

--
-- Extraindo dados da tabela `simposio`
--

INSERT INTO `simposio` (`idSimposio`, `titulo`, `descricao`, `dataInicial`, `dataFinal`, `local`) VALUES
(1, 'I° Simpósio de Engenharia Civil\nMateriais, Sustentabilidade e Inovações Tecnológicas ', 'O I Simpósio de Engenharia Civil: Materiais, Sustentabilidade e Inovações Tecnológicas tem como objetivo contribuir na capacitação dos discentes do curso de Engenharia Civil nas aplicabilidades de materiais nos distintos setores e de suas propriedades. Desenvolver o espírito crítico acerca dos impactos sociais, ambientais e econômicos dos materiais de engenharia e de inovações tecnológicas, por meio de palestras com docentes e empresas renomadas na área e a realização de visitas técnicas, que ocorrerão em uma jazida de gnaisse (obtenção de britas e areia artificiais) e na usina de reciclagem de resíduos de construção e demolição, ambas em Varginha.', '2019-08-08', '2019-08-09', 'CEFET-MG (Varginha)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `simposista`
--

CREATE TABLE `simposista` (
  `idSimposista` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `senha` varchar(100) NOT NULL,
  `instituicao` text,
  `cidade` varchar(45) DEFAULT NULL,
  `tipoSimposista` char(1) NOT NULL COMMENT '1 = Aluno Cefet\n2 = Publico Externo',
  `situacao` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Ativo\n = Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `simposista`
--

INSERT INTO `simposista` (`idSimposista`, `nome`, `email`, `matricula`, `cpf`, `rg`, `telefone`, `dataNascimento`, `senha`, `instituicao`, `cidade`, `tipoSimposista`, `situacao`) VALUES
(1, 'Mag Geisielly Alves GuimarÃ£es', 'mag@cefetmg.br', '201511234567', '01597012602', '5721538', '35991617001', '1987-02-16', '23fb7e0475fd58065b3b3bbe215203902c906b31', '', '', '1', 'A'),
(8, 'Gabriel AraÃºjo Felizardo ', 'gabriel.araujocivil@hotmail.com', '201718120451', '10349760608', 'Mg18431936', '35984454613', '2019-07-08', '1b0d93d3cc303a642c8b51daae966160ab0599a9', '', '', '1', 'A'),
(9, 'Kezya Milena Rodrigues Pereira ', 'kezyamilena@gmail.com', '201528120248', '15041916764', '211940185', '35988968228', '1994-02-05', 'd2dce73dc5b7cd4898f7b6251ec2f5b245a28e4a', '', '', '1', 'A'),
(12, 'Fabio Augusto Junqueira Mafra', 'fabio_jmafra@yahoo.com.br', '201528120175', '12403502600', '18694568', '35991307403', '2019-07-08', '17e49257a837656ac02dcdfa7df6873d9c1d7ce2', '', '', '1', 'A'),
(13, 'Gustavo Ribeiro Paulino ', 'ribeiro.gustavop@gmail.com', '201618120182', '13027908626', 'MG17024566', '35992228022', '1997-07-31', '643293d2464c25d3ccaccec54dd13d7a5f786147', '', '', '1', 'A'),
(14, 'Ana Carolina Rodrigues Ferreira', 'nitarodrigues5@hotmail.com', '201518120075', '08156200632', 'MG16775806', '35988804603', '1993-03-10', 'a1d00f09094e86ff81074c06b07a3b06baefbefa', '', '', '1', 'A'),
(15, 'Gabriel nogueira de brito', 'gabrielnbrito@outlook.com', '201618120131', '07961470603', 'Mg15105316', '35998053265', '1995-06-20', '0d639b503008b9759cd4c7c2940c5ea6ab662838', '', '', '1', 'A'),
(16, 'Nandhara AraÃºjo Dias', 'nandharaadias@gmail.com', '201518120318', '10212748602', 'Mg17790820', '35987052102', '1995-09-05', '15be5b64023d40c34784972e026a92ecfe4f16dc', '', '', '1', 'A'),
(17, 'Naiara Faria Lima ', 'naiara_faria_lima@hotmail.com', '201528120302', '12197224646', 'MG20078972', '35991658218', '1997-05-22', '092f488e05c1af21c92940ee1790b0ffe220de0e', '', '', '1', 'A'),
(18, 'Eline Morais ', 'eline.morais17@gmail.com', '201518120156', '11797968610', 'MG17925972', '35999849767', '1996-11-17', 'e3b875e08e6bf30be5ac8e6ff34000bf6e736ddd', '', '', '1', 'A'),
(19, 'Caio Pala Cardoso ', 'xcaiopala@gmail.com', '201518120148', '09875035610', '14696048', '35988351963', '1996-07-10', 'dd444c6be2180651a88ff3af65bc6cfb8d58125e', '', '', '1', 'A'),
(20, 'Thais Ribeiro Melki', 'thaismelki@gmail.com', '201518120385', '11880922606', 'mg13920915', '31996113628', '1994-05-19', 'cb22b99aa2885a5061efa260d96f228b254cb2e8', '', '', '1', 'A'),
(21, 'Thalles de Oliveira Macedo', 'thallesm.vga@hotmail.com', '201518120440', '10012107603', 'MG12703743', '35988910779', '1996-10-29', '22c3b2303b59c8205eff3078d3b26c68551629f3', '', '', '1', 'A'),
(22, 'Guilherme Santos da Silva', 'karol_bass@hotmail.com', '201518120210', '12518587575', '188550590', '35984116571', '1996-05-25', '7a40d787339292c5c9455209a40eee6306395a16', '', '', '1', 'A'),
(23, 'RÃºbia Dayanne Santos Rodrigues de SÃ¡ ', 'rubiadayannesantos@hotmail.com', '201518120377', '12440192678', '19863975', '38991493301', '1997-04-23', '42b4a4b1376852d1995d61762f192514b75bb18f', '', '', '1', 'A'),
(24, 'EDUARDA OLIVEIRA RODRIGUES DE PAULA', 'eduarda.rodriguesdepaula@gmail.com', '201718120075', '11633960609', '19124327', '32985085448', '1999-02-09', 'a3aa98b2b7abbb9916aadab678cf3a3af0c0a97a', '', '', '1', 'A'),
(25, 'Ana Paula Moreira de Faria', 'apmfaria@gmail.com', '201518120091', '06798157670', '12088668', '31996539071', '1985-10-31', '0704eee1a3915b2a3e03a07e15c760f0b1543c8d', '', '', '1', 'A'),
(26, 'Ana FlÃ¡via Lima Reis', 'a.flavialimareis@hotmail.com', '201718120281', '12463231688', '17877567', '35998410229', '1995-12-12', '769f942b776846b942fce5f9a1329501ad5d23b8', '', '', '1', 'A'),
(27, 'JoÃ£o Paulo Campos de Resende', 'joao_paulocr@hotmail.com', '201528120230', '01953698662', 'MG19801147', '35988282248', '1997-02-21', 'bc59f758d87ae3f5cee94b9a39cfb6bf83c181f9', '', '', '1', 'A'),
(28, 'HENRIQUE COMBA GOMES', 'henriquecombagomes@gmail.com', '201618120190', '13253961680', '14040540', '35998000301', '1997-01-03', 'eaaa7cd09b178e8b61e4c4e3f972a9ef4802009b', '', '', '1', 'A'),
(29, 'Fabiana Silva Finoti', 'fabifinoti25@gmail.com', '201718120168', '14064076664', '20475151', '35987034731', '1999-03-25', '69d6db5d890823caf5753beb72e866448ef6aac2', '', '', '1', 'A'),
(30, 'Graciela Tavares Silva', 'gracielatavares@hotmail.com', '201628120355', '13448503673', 'MG18700580', '35991182762', '1996-01-15', '25a50eefe091987f9c5084f063f571090bc6948e', '', '', '1', 'A'),
(31, 'Lucas Viana Castro', 'lucas2696_@hotmail.com', '201628120207', '12543696601', 'MG18582830', '35998452070', '1996-03-26', 'ddbdae67862e19defea10b3bbd0b53def5ebca1f', '', '', '1', 'A'),
(32, 'Erik Ortolano', 'ortolanojunior@gmail.com', '201528120159', '12179814623', '468574955', '35992371931', '1997-10-12', '80da47abc999a01356bacfae96deb3ef81cb9702', '', '', '1', 'A'),
(33, 'Lilian Freitas Pereira', 'pereiralilianf@gmail.com', '201518120237', '12933656612', 'Mg19248489', '35998104390', '1997-06-08', 'ba916ae7b4f644998efd41f40ca8d3478157fe5f', '', '', '1', 'A'),
(34, 'Tamiris EstÃ©fane Costa', 'tamiris625@gmail.com', '201528120400', '12240909692', '18752047', '35988443552', '2019-07-08', '811692424f2f5e5a97a934e19b2f282c293dacfd', '', '', '1', 'A'),
(35, 'ANDREZA BERTOLI DIAS VALÃ‰RIO', 'andrezzabertoli@gmail.com', '201628120371', '11891514644', 'Mg17773731', '35988652954', '1994-07-06', '1f1ba497909e670a314a1bdaca516d2cf60cd167', '', '', '1', 'A'),
(36, 'Gabriella Dias Xavier', 'gabidiasxavier@hotmail.com', '201628120363', '15995001752', '218749703', '21968436015', '1998-05-18', '4e808fb1d76e93127b67a95be7767256962fab86', '', '', '1', 'A'),
(38, 'Thalita Bruna Oliveira', 'oliveira.thalitabruna@gmail.com', '201518120393', '12313443698', 'MG17200582', '37999555319', '1996-03-15', '1097b02cf3de987259cfa12df671ca5a841e089d', '', '', '1', 'A'),
(39, 'Leandro Diniz Pitaluga', 'ledipi13@gmail.com', '201518120229', '06737008607', 'MG10356838', '35999245127', '2019-07-08', 'e4cd01bb80b0a09fb92ebf728ec88e1775db8c1e', '', '', '1', 'A'),
(40, 'Henrique Paiva Nogueira ', 'henriquepaiva.n@hotmail.com', '201718120192', '08508662602', 'MG15351601', '35998147366', '1991-07-30', '15a6c57d20d178788e21be2a8f144a809803219f', '', '', '1', 'A'),
(41, 'Lauriana Pereira Costa', 'laurianacosta7@gmail.com', '', '12441184601', 'Mg18758032', '35984411838', '1996-04-21', 'ca87bf41a4a359b5823a9a8199628d3e414718c9', 'UNIS MG ', 'VARGINHA ', '2', 'A'),
(42, 'Ana Caroline Silva Do Carmo', 'docarmo.anacarol@gmail.com', '201518120083', '10454622686', 'MG15647611', '35988926207', '1994-11-09', '58ca50058723db8056efcb31aaa5837cf82dd08a', '', '', '1', 'A'),
(43, 'Carlos Henrique Costa Vieira', 'carlos_h09@hotmail.com', '201718120265', '11450540643', '17994369', '3592026164', '1998-09-27', 'b925fa623006e43bb27bb6172d805c4c17eb072b', '', '', '1', 'A'),
(44, 'PlÃ­nio Marcos Lemos Silva', 'lplinio81@gmail.com', '201518120342', '10912740612', 'Mg19004310', '35988598240', '1995-07-03', '734be674ab905d79add3276ae9d0ab27ca8b0252', '', '', '1', 'A'),
(45, 'Beatriz Metelo GonÃ§alves', 'beatrizmetelo@gmail.com', '201628120258', '13508548678', '0400712253', '31985790145', '1997-11-25', '887a84a849b105e434a61d240de95dedc2d78a67', '', '', '1', 'A'),
(46, 'Fernanda Campos de Paulo', 'fercpaulo@gmail.com', '', '12527027601', '6263527027601', '12981170110', '1995-05-23', 'fe9e393a64d17c2ef0d90cf7fbd59a191b7f46de', 'UNESP', 'SÃ£O JOSÃ© DOS CAMPOS', '2', 'A'),
(47, 'Eder Vitor Siqueira', 'edervsiqueira@gmail.com', '201718120176', '05951234654', 'MG11136674', '35991000877', '1982-05-06', 'a7397349cb33c0bb33549cf52b0271da067d1028', '', '', '1', 'A'),
(48, 'Maria Paula Castro de Miranda Brito', 'mariapaulabrito@hotmail.com', '201718120087', '13049082674', 'Mg19316128', '35988719594', '1997-03-13', '9b5d15cc98acde56d64336633778e41b21da1a45', '', '', '1', 'A'),
(49, 'Guilherme Silva Oliveira', 'guilhermevga00@gmail.com', '201528120191', '13018889665', 'MG19286622', '35992219763', '1997-02-01', 'f763b121abca3ca32d67d8c9ceb7ac9602eef58e', '', '', '1', 'A'),
(50, 'Ingrid de Ãzara Pinheiro', 'azaraingrid@gmail.com', '201528120213', '13099703605', '13423705', '35992207374', '1997-02-25', 'c7e3388e0be555bd8eb899705a2eec402679a018', '', '', '1', 'A'),
(51, 'Adelcio Bertoldo', 'adelciobertol@gmail.com', '201618120026', '66232651634', 'M5622369', '35988220511', '1970-08-19', '1a67d4e8d9868fa8c15b9f49b84cc3b89c6c6748', '', '', '1', 'A'),
(52, 'Anislaine de Jesus Santos', 'anislainelaine@gmail.com', '201618120077', '13313671667', 'MG19782740', '35984722550', '1995-09-19', '2ff3e465274a671ff32bf3cb25453a41aa551436', '', '', '1', 'A'),
(53, 'thais mariana silveira fermino', 'thais-mariana@live.com', '201628120070', '01998445690', 'mg18590318', '35998726881', '1996-04-18', '07cdd78fbad9b2e9722a7f7be87769ff1045850f', '', '', '1', 'A'),
(54, 'FERNANDO DE ANDRADE NASCIMENTO', 'fernando.nascimento2copasa@gmail.com', '201718120443', '06257724660', '12000511', '35988652712', '1984-12-02', '6a14347f4aace6888d237b7cd40481080fe36def', '', '', '1', 'A'),
(55, 'Anthony Bahia Scalioni', 'scalioni.anthony@gmail.com', '201518120105', '11659657636', '14576537', '35988812122', '1994-01-07', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '1', 'A'),
(56, 'Bruno Rossignoli Pires', 'brunorossignoli@hotmail.com', '20183028018', '12460334613', 'MG18774010', '35984737264', '1996-01-25', '2c25a16e2da3c95fc04be76a0f9cd9e7fb4950de', 'CEFET ', 'VARGINHA', '2', 'A'),
(57, 'Maria Rafaela Da Silva', 'mariarafaela_vga@hotmail.com', '201518120270', '13123569608', 'MG18780500', '35998700772', '1996-04-16', '93259278b53fa2d4b7c53e14bc9c74beb6623271', '', '', '1', 'A'),
(58, 'Vitor Guerra ', 'vitorguerra779@gmail.com', '201718120184', '13783861675', 'MG20706875', '35999318980', '1999-06-29', '7a7863b0444caf5a7521576b1637737100653d48', '', '', '1', 'A'),
(59, 'Bianca', 'biancaarocha73@gmail.com', '2018300781', '13872687670', '20362041', '35988713435', '1997-10-02', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '1', 'A'),
(60, 'Wesley Caetano da Silva', 'wesleycsilva@yahoo.com.br', '20183123456', '05961827674', '123456', '31987270867', '1980-03-07', '23fb7e0475fd58065b3b3bbe215203902c906b31', '', '', '1', 'A'),
(61, 'LUIS FELIPE DE ASSIS BORGES', 'felipeassisborges@outlook.com', '20183015833', '01880740664', 'MG19487957', '35988123856', '1997-03-02', 'd3062fffba90369a72732c0c6d692f4533f8ce05', '', '', '1', 'A'),
(62, 'KAIO HYAN LEITE RODRIGUES', 'kaio.hyan@icloud.com', '201628120274', '42821067860', 'MG21063583', '35998271983', '1993-12-19', '0fa6726d21faff333b22f8e403a58d33bab57f6e', '', '', '1', 'A'),
(63, 'RanÃ­sia Rangel', 'ranisiarangel121@gmail.com', '20183009522', '02222926602', '20595580', '35997296957', '1999-11-12', '5451459721ba64e4e0f2c589e6c1dd9e37219ba5', '', '', '1', 'A'),
(64, 'Rebeca Coelho dos Santos Silva', 'rebecagintama@gmail.com', '20183007279', '04464589537', 'mg22842619', '35997596131', '1999-03-15', '92b7540f2f0b61bd69b40a28e2140a1488593f79', '', '', '1', 'A'),
(65, 'Ana Carolina de Jesus Rodrigues', 'carolyny.rodrigues@gmail.com', '20183007377', '13210005613', '21001924', '35988674771', '1998-06-30', 'ab0e33756f87f252459b5db638e29f8bb26191ce', '', '', '1', 'A'),
(66, 'Gabriela Tavares da Silva', 'gabriellasilvatavares@gmail.com', '20183013516', '01862649685', 'MG19395819', '35999463695', '1999-07-22', '4568b43a59724f65cc49d695de716aad64f01612', '', '', '1', 'A'),
(67, 'Luciana dos Santos ', 'lucianasantenf@yahoo.com.br', '201728120110', '06733058642', 'MG13237064', '35999430583', '1983-02-05', '7e78cd76b185e38f3abbe9b16756405977f9841b', '', '', '1', 'A'),
(68, 'Marcelo Borges Baptista Mello Filho', 'cacacinelo@hotmail.com', '20183009700', '17233834733', '310740410', '21970149321', '2019-07-17', '4a595fe63a1a55445d92eb5413a692577774c96e', '', '', '1', 'A'),
(69, 'Flaviana Rodrigues da Silva', 'flaviarodrigues2103@gmail.com', '201728120403', '01532206275', '6193836', '35998297796', '1992-08-15', 'c31d8888f47f4f80e0a4778de295af04f9ac4ea6', '', '', '1', 'A'),
(70, 'Gabriel', 'gabrieloliveirc@gmail.com', '20183007519', '13571506600', 'MG18883483', '35984169960', '2000-01-27', '9a80336f8208cda06acc346ddcadae36368f31f7', '', '', '1', 'A'),
(71, 'Larissa Aparecida RogÃ©rio Batista', 'larissabatista529@gmail.com', '20183007214', '13296350608', '19828506', '35999017762', '2000-05-03', '6adcd74ed15d89b8a134d75a84ae4ebb807d4b90', '', '', '1', 'A'),
(72, 'Eduardo Ananias Oliveira', 'casasaobraz_matconstru@hotmail.com', '20183016868', '05881635620', '12413768', '35999585113', '1983-07-24', 'f3701346a4990bf7e3434229d3bb94e38c72c84e', '', '', '1', 'A'),
(73, 'Ilana Freitas Sousa', 'ilana_freitasvga@hotmail.com', '201518120199', '12769923609', 'MG18398093', '35998845138', '1995-03-04', '532b6d95a6f1b92128d38a79f995d347e6f2ec90', '', '', '1', 'A'),
(74, 'Renan Beneton Damasceno', 'renanbeneton2015@gmail.com', '20183013472', '12946618684', '17422414', '35988464966', '1999-11-19', 'f76a7400662a8d195aee003183e166f08e5a4889', '', '', '1', 'A'),
(75, 'Felipe Machado Colacino', 'felipecolacino@gmail.com', '201528120183', '10286836696', 'MG17151551', '35988571708', '1997-04-16', 'c4d7a84daa60a411f8f72c39502fd4ab98ccb7bb', '', '', '1', 'A'),
(76, 'Marcela Figueiredo de Morais', 'marcelafigmorais@gmail.com', '201618120395', '49007912615', '45590930839', '12988258058', '2019-07-18', '2d561c6dbe505f30314fa9d799901aab02431c4e', '', '', '1', 'A'),
(78, 'Thallysson Douglas Machado', 'thallysson_douglas@hotmail.com', '20183022829', '01905731639', 'MG18000179', '35992444489', '1997-11-22', 'dc1de98819d5acc69cd49121fcdea9a33b4c1662', '', '', '1', 'A'),
(79, 'ALBERISSA DE OLIVEIRA SAMUEL ', 'alberissa_oliveira@hotmail.com', '20193014114', '01862929610', '19397254', '35988593654', '1996-08-05', 'fbf2c82eeb78cef848835fd5e2693d5370e699f3', '', '', '1', 'A'),
(80, 'Gustavo Alves Silva', 'gustavoalves562@hotmail.com', '20193013860', '70004198654', 'MG21025241', '35991458059', '2001-04-27', '6524378ee15a8f6b0e95b32e428d3fdcc42cae36', '', '', '1', 'A'),
(81, 'Breno  Vieira Vasconcelos', 'brenorvv@hotmail.com', '201728120420', '12798435609', 'MG19084666', '35984026886', '1999-03-01', 'f2b2fb4756c892f2245ea66f53735d205155b439', '', '', '1', 'A'),
(82, 'Sophia Gabinio MendonÃ§a', 'sophiagabinio@gmail.com', '20193003747', '11361576626', 'Mg16992046', '35999099888', '2001-02-24', '0b176db75522353ab2792ccd3ab30c1715116602', '', '', '1', 'A'),
(83, 'Geovanna Pires de Figueiredo', 'geovannapfigueiredo@gmail.com', '20193000413', '08947927686', '12161105', '35988113707', '1995-07-29', 'a4f25a5925875806c6647916ada292b3699da247', '', '', '1', 'A'),
(84, 'Denize Ferreira de Carvalho Costa', 'denize.27costa@hotmail.com', '201728120128', '12990525688', '19616149', '35988373211', '1998-01-10', '79ad06d0f505af86a377d8973af773b99743b441', '', '', '1', 'A'),
(85, 'Gabriela Silva de Jesus ', 'gabi.silva.sj@gmail.com', '20193009150', '14856032690', 'MG21287358', '35988718351', '2001-03-16', '62193a6fb579462ffc3cd7ef7e904b8189c5222f', '', '', '1', 'A'),
(86, 'Pedro de Castro JÃºnior', 'pedrodecastrojr@hotmail.com', '201518120326', '13068759609', '17138693', '35998883798', '2019-07-29', 'a699e6407d799335cd8082c78314eb1837a5ffa8', '', '', '1', 'A'),
(87, 'Guilherme Martinelli', 'guilhermemartinelli10@gmail.com', '201518120180', '12039574670', 'MG18421634', '35984622479', '1996-12-12', 'de4eb3eb3b9b93044a40b09145959e1cc14d77bb', '', '', '1', 'A'),
(88, 'Rodrigo Lucas Da Silva Souza', 'rodrigo.lsouza97@gmail.com', '201528120388', '12280031655', 'MG18685143', '35992223603', '1997-07-23', '7e2fb41ad9cda35b3cb52f1f338d1f0513dedd68', '', '', '1', 'A'),
(89, 'Vinicius', 'viniciusfreire02@yahoo.com.br', '201528120434', '01592693695', '13664581', '55359922562', '1987-01-02', '149ff6bd489caa2dd047d69af7bc750b251a62a7', '', '', '1', 'A'),
(90, 'Gabriela Borges Lopes ', 'gabriela.borgeslopes@gmail.com', '201618120166', '10499775643', '15441142', '35999123695', '1995-01-28', '6a7b00ec28df01fd7fdd9887a07c809c6b314edc', '', '', '1', 'A'),
(91, 'Marcos Filipe Silva', 'marcosfilipe6600@gmail.com', '20183007591', '11792541635', '383913822', '12996840451', '2000-01-19', '1fab97de6932d77d7344b912bdee7c77a197b763', '', '', '1', 'A'),
(92, 'Luis Eugenio Ferreira Azevedo', 'luiseugenioferreira@hotmail.com', '201528120280', '13041424690', 'MG17571465', '35988224606', '1997-03-19', '78d75b1f679ea36efe4dc5c4e69e21b2eeb478f9', '', '', '1', 'A'),
(93, 'VinÃ­cius Oliveira Lara', 'vlara.coq@gmail.com', '201528120442', '09589955645', '18794658', '35999484653', '1996-05-19', '607908d3ea38d4b907675aee3a82002130cf7dc6', '', '', '1', 'A'),
(94, 'Elisa Clara e Silva', 'elisacsbarreto@gmail.com', '20193012129', '12481754689', 'MG18014955', '31999025019', '2019-07-31', 'e3a19b5cb04b332fdf6d06f14312e400832f220c', '', '', '1', 'A'),
(95, 'WALTER LUCAS SOARES SILVA', 'walterllucass@gmail.com', '201618120387', '13762068623', 'MG20133416', '35992638559', '1996-12-04', '35c851d0e4be8d41f16cc53a195a8fabac11636d', '', '', '1', 'A'),
(96, 'AndrÃ© Luiz Alves Gabriel', 'a.alvesgabriel@live.com', '201618120476', '10830118632', '16727900', '35987024268', '1993-07-08', '81f8a22c66caa90059d14bc8b07cda7f9907cffa', '', '', '1', 'A'),
(97, 'Ariana Pierroti Baldim', 'apierroti@hotmail.com', '201618120441', '06755767689', '16877903', '35988314058', '1991-05-15', '6173d6436489281d71d9122b30dfa18b71c6a40b', '', '', '1', 'A'),
(98, 'Tainara Costa D\'Angelo', 'Tainaratcd3@gmail.com', '201528120396', '13224555629', 'MG18380060', '35998123029', '1996-09-03', '1afffb2bde5559a1565a3cd79d6646c29a0686dc', '', '', '1', 'A'),
(99, 'Emerson R Pinheiro', 'emerson_vga@outlook.com', '201618120093', '12986306659', '19254549', '35988860050', '1998-03-26', '79d0d7f228e3ce27d14c390257167c8e8549ab14', '', '', '1', 'A'),
(100, 'Gabriella Carvalho dos Santos', 'gabiniky@hotmail.com', '20183013599', '10742955605', 'MG17296548', '35988568551', '1999-11-16', 'e9fe0aecf566b72e806a92117b6090db83304dee', '', '', '1', 'A'),
(101, 'Dayene do Nascimento Felicio', 'dayenenascimento@yahoo.com.br', '201628120266', '11508432686', 'MG16019650', '35988364226', '1994-03-01', '6733bf571871f3dc55389645c81c0297605c57d6', '', '', '1', 'A'),
(102, 'NÃºbia Paiva e Souza', 'nubiapaiva9@gmail.com', '20183007573', '02193440603', '16628427', '35991572666', '1999-02-23', '3734782633e2256af7cf073bb48afcc27a12fed9', '', '', '1', 'A'),
(103, 'LavÃ­nia Karla Pedrosa', 'pedrosa.lavinia@gmail.com', '201728120357', '11195212623', 'Mg19243535', '35997673891', '1997-05-10', '270401a68e40ba7c86bae24e3df96e10c756e541', '', '', '1', 'A'),
(104, 'Fernando Gomes de Sousa', 'gsousafernando@gmail.com', '201718120338', '02004288612', 'MG19950918', '35998304174', '1999-01-09', '7976a29ed025fb090290154370fc19dbc1c1da97', '', '', '1', 'A'),
(105, 'Caio Tiso Oliveira', 'caiotisooliveira@gmail.com', '201718120010', '13846548600', 'MG15586380', '35999001574', '1999-06-29', 'a103149cca787aff901e864f57685daa629a8b47', '', '', '1', 'A'),
(106, 'RomÃ¡rio Thiago Bueno', 'romariotb@hotmail.com', '201628120347', '11628496657', '16565284', '35987166270', '1993-12-20', '66ad17f9e189846a4583e5dbc425957f74c7fb8e', '', '', '1', 'A'),
(107, 'Isabela Daiana Pereira', 'isabela_daiana@outlook.com', '201718120206', '12576829627', 'MG20498471', '35988930299', '1999-03-24', '5df3a2fcf45a13cfbeec3ca882f20dbce63b204a', '', '', '1', 'A'),
(108, 'Gabriela Rembowski Pires', 'gabiremb@hotmail.com', '201718120435', '40564519820', '52934967x', '35999857617', '1997-04-08', '3a03546bfcdb81113f4a3128f16c7ed688b40757', '', '', '1', 'A'),
(109, 'Denison Maciel Arantes', 'denisonmlvc@yahoo.com.br', '201528120140', '08315042696', '13889564', '35998257818', '1986-11-30', '099e9947551a351fd4cf576268a5fee425d7b10f', '', '', '1', 'A'),
(110, 'Klinsman Ramirez de Souza', 'klinsmanncefet@gmail.com', '201728120012', '14069658637', '19182635', '35999840709', '1998-09-19', 'fea9720cac5d16096328737659fa8906559ec6a2', '', '', '1', 'A'),
(111, 'Maiara Cristina de Oliveira ', 'maiara.oliveira_tresp@outlook.com', '201728120330', '11502852659', 'MG19067157', '35998998262', '1993-09-20', 'cd66ae2453e88c4d81613de2a378f4488f9c28a2', '', '', '1', 'A'),
(112, 'Matheus Henrique Gomes Silva', 'matheushgs@outlook.com', '201618120263', '12519237635', 'MG18849531', '31992341938', '1996-05-20', '2db472b5820fba6c5c7c1804f3523d98421cbb64', '', '', '1', 'A'),
(113, 'LuÃ­s Filipe Louzada Resende Azevedo', 'lf.louzada@gmail.com', '201718120028', '08861001602', '15443336', '35988776422', '1989-02-21', '9094a9cfc7d9ee82834d4fd7c14e905967556b4d', '', '', '1', 'A'),
(114, 'Mariana Rembowski Pires', 'maarirembowski@gmail.com', '201618120450', '40564520837', 'MG529997460', '35998824925', '1996-01-19', '27e72e18c1068149060fa5ce55a16228e1beec68', '', '', '1', 'A'),
(115, 'Ariane', 'ariianepereirareis@gmail.com', '20183023666', '11354822684', '21744239', '35988311402', '2000-01-03', 'dccbcc579ac1140098e39ae8c4522621e90fe800', '', '', '1', 'A'),
(116, 'Marcelo Marques de Paiva', 'marcelomarquesdepaiva@gmail.com', '201518120220', '11955913650', '14451949', '35999641042', '2019-08-08', '5adee50d4dbc3fd6456002099fbcca4302f54189', '', '', '1', 'A'),
(117, 'JÃºlia Palmuti claudio', 'julia.eng2017@hotmail.com', '201718120060', '12543429662', 'Mg18870056', '35988552749', '1999-03-01', '79a8c5c5342638ce840912e8506d3fb9ab75ea0f', '', '', '1', 'A'),
(118, 'Pedro Henrique Rosa Carvalho', 'pedrohrosa97@gmail.com', '201518120334', '13095965656', 'Mg17008540', '35999279616', '1997-05-09', '91bc976f0a2bd6b2f26acd6448adfa74f0f6a1e8', '', '', '1', 'A'),
(119, 'MICHELLE NAKAMURA SIMÃ•ES', 'michelle_nakas@hotmail.com', '201718120273', '01024320901', '10622373', '35991009225', '1990-07-11', '65fba35c5fc667670ad21bec0b426e1e92c0e95e', '', '', '1', 'A'),
(120, 'Thalles de Carvalho Vallim', 'thallesvallim@gmail.com', '201528120418', '13498864670', 'MG15420978', '35999858883', '1996-10-16', '27b0caaea8c85124542d3818af713bb5a0626e86', '', '', '1', 'A'),
(121, 'Bruno Campos Silva', 'brunosameth@gmail.com', '201718120044', '10317421662', '18578034BR', '32999869852', '1997-01-30', '50deb2a90819272ff7b9af546eb4b444aa3a5a6b', '', '', '1', 'A'),
(122, 'Eduardo Henrique de Freitas Silva', 'eduhfs@hotmail.com', '20183017829', '02412091617', 'MG18828145', '35999799955', '1999-12-20', '22331c9c10f7aa2af29d95c2f919202039fa09d5', '', '', '1', 'A'),
(123, 'Mariana Rezende de Carvalho', 'mariana.rezende9@gmail.com', '20183004787', '11920723676', 'MG16670193', '3532237215', '2000-01-07', 'fe89fe74bbbfcb8e800c0c9e29d7d1fb43566f2a', '', '', '1', 'A'),
(124, 'Taciani Silva LourenÃ§o', 'tacysilva19@gmail.com', '201718120320', '09238240655', 'MG21000217', '35998302423', '1998-07-09', '3973e30677a7f25bbdacb8aa4cffa6a58cca6a1a', '', '', '1', 'A'),
(125, 'Layene Christine Rosa Chagas', 'layene.chagas@hotmail.com', '20183007439', '02204426652', '20543505', '35988210389', '1999-08-26', '54054d2c448c6ae9862ed4f867aa251fad9d6b99', '', '', '1', 'A'),
(126, 'JÃºlia Caroline', 'juliacfabiano@hotmail.com', '20183007297', '02030626735', 'MG18315125', '35999119405', '2000-02-26', '6cf61d1c81d192fbdf5b5047ab741a38363a4d65', '', '', '1', 'A'),
(127, 'Larice Rocha da Silva ', 'laricerochadasilva@gmail.com', '20183022060', '12142914659', 'Mg21334834', '35987016822', '1999-08-18', '4331977139726aed0152c3558ab6c005de6e28a3', '', '', '1', 'A'),
(128, 'Augusto Henrique Diniz do Carmo', 'augustomgtp@gmail.com', '20183004885', '08963616673', 'Mg20632145', '35999587285', '2000-04-04', 'acc472c1643437e76820c9fd89a594f0ee9e2e13', '', '', '1', 'A'),
(129, 'Mateus Filipe', 'maateus51@gmail.com', '20183007770', '01912403625', 'Mg19632308', '35987129223', '1999-03-24', 'f4091e74e99908671af86ae9fbca489ee470c900', '', '', '1', 'A'),
(130, 'Augusto Moreira Sousa', 'moreira_sgs_@hotmail.com', '201528120078', '10246652675', '13744889', '35998127334', '1996-12-11', 'deaeb3594b7a47bf39cd7d50d7570c3927f3f16e', '', '', '1', 'A'),
(131, 'Baby Maria Ferreira ', 'kikobaby@bol.com.br', '201718120125', '00581387651', 'M7924298', '35999934239', '1974-11-09', 'acc472c1643437e76820c9fd89a594f0ee9e2e13', '', '', '1', 'A'),
(132, 'Iris Cristiane Carlos', 'irislogistica@hotmail.com', '20193000674', '05989350619', '13744976', '35991514640', '1981-08-06', '7273a0a1596c7b2cb8e63c0a4b45cc2ccd791bee', '', '', '1', 'A'),
(133, 'Millena Ribeiro', 'millacribeiro@hotmail.com', '20193009197', '15024465610', '1100653078', '35988130689', '2001-03-13', '8580d40e6acb216422b99a9d51b3cbceec2e388a', '', '', '1', 'A'),
(134, 'Yara Andrade ', 'yara.arqbernardes@gmail.com', '20193000718', '12000435610', '18362891', '3532311260', '1994-03-10', '3f1bab538c3303a5616ede6da86e2bc79976b531', '', '', '1', 'A'),
(135, 'Philipe Salvador Loredo ', 'philipeloredo@yahoo.com.br', '201830133490', '06873733601', '14317744', '35984565918', '1986-03-29', '61b5ebc2981140c127ce3bf5d482dd6c79909ee2', '', '', '1', 'A'),
(136, 'Bruno Bonifacio Marcelino ', 'brunobmarcelino@hotmail.com', '201728120187', '10147375673', '18201625', '35988596909', '1995-05-29', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '1', 'A'),
(137, 'Lara Carvalho SimÃµes', 'laarinhacs2012@gmail.com', '201728120365', '12029549606', '18489974', '35988071641', '1998-12-17', '457b73a19293b715be16449a4642a3a6e4d82dd8', '', '', '1', 'A'),
(138, 'Breno RomÃ£o Naves', 'shoxzim@gmail.com', '201728120446', '70003672611', '21024000', '35988987993', '1998-09-23', '457b73a19293b715be16449a4642a3a6e4d82dd8', '', '', '1', 'A'),
(139, 'Jessica da Silva Brito', 'jessikacrv@hotmail.com', '201728120080', '11067987673', '18652030', '35999267983', '1992-10-25', '37135df10d60765bd3c0b4e438bcc190989e3d12', '', '', '1', 'A'),
(140, 'Israel Mateus Melo Oliveira', 'israelmmoliveira@outlook.com', '201718120389', '11582261601', 'Mg19540482', '35991592428', '1998-07-22', 'b4df05fe1bd5d25eb604d22ff08346cd7be351e5', '', '', '1', 'A'),
(141, 'Fernanda Bueno Pereira ', 'ferbpereira@hotmail.com', '20193009535', '14473529630', 'MG20894235', '35991373162', '1999-09-08', '1e2fbd69dfe3ee0f0c4b22632957b13f5f619472', '', '', '1', 'A'),
(142, 'LEANDRO CARVALHO DOS SANTOS', 'leandroespcex@hotmail.com', '201718120346', '', '', '35988846292', '1988-02-08', 'a906fd75b7245387617b5a60b75cd744756fb114', '', '', '1', 'A'),
(143, 'Talia Brenda Abreu ', 'taliabrenda-1@hotmail.com', '20183013614', '14543578600', 'Mg20974613', '35999839517', '1999-05-12', '3728aab4f0bc483c637bbde523f444952442178a', '', '', '1', 'A'),
(144, 'Sabrina Pierroti Ribeiro ', 'pierrotiribeiro@hotmail.com', '20183028054', '02004868619', '19953075', '35998283100', '1999-04-21', 'aa8b9f32d881a976dc849cf1d6a7812dceec1b1b', '', '', '1', 'A'),
(145, 'Guilherme Ribeiro de Paula ', 'guiribeiro1994.tc@outlook.com', '201718120419', '11276830637', 'MG17731930', '35984719411', '1994-03-27', '7ffb7826ceb13de9d82e9a03238d9d82a730f2ec', '', '', '1', 'A'),
(146, 'Antonio Carlos de Paula Xavier', 'acpx_depaula@yahoo.com.br', '201728120268', '59146796649', '475581', '35991423951', '1968-05-20', 'a6873b8e247779bdb3d64adbcfa14f7d7c5717ae', '', '', '1', 'A'),
(147, 'Gabriel de Paula Batista', 'gabrielbatistatp@hotmail.com', '201618120123', '01926919610', '20487454', '35998036304', '1997-08-20', '4e134d9a2578fd21c17faa24253a2b304a450b54', '', '', '1', 'A'),
(148, 'Mariana Cristina Delfino Bernardes ', 'marianacris_10@hotmail.com', '20183022589', '14895176690', '21515896', '35998233156', '1999-12-06', '773726026158ba67ccdc1f130af2da6a964badfa', '', '', '1', 'A'),
(149, 'Quelen Ribeiro Fernandes ', 'quelen_ribeiro@hotmail.com', '201528120345', '11821992679', '18676148', '35984630144', '1994-04-20', 'aee288d5223bfcee6198129c42e24018ccddf063', '', '', '1', 'A'),
(150, 'Rafael Furbino Frossard', 'rafaelffrossard@gmail.com', '201728120381', '09700847659', 'MG17575108', '33991057986', '1997-09-25', '066bd03aabb58f32af008094cb14a158d542fe83', '', '', '1', 'A'),
(151, 'Christian Reis Santos Bocardi Machado', 'christianreis04@gmail.com', '201628120304', '36689037860', '365360661', '35988293435', '1998-08-04', '75d372fd57ddd7c47ec3ecfd4e6d46c4530b305c', '', '', '1', 'A'),
(152, 'Leandro JosÃ© Penha', 'leandrojpenha@bol.com.br', '201628120240', '08755726690', '13977161', '35987047375', '1987-04-03', '1436675213d58ef88d5ec3d90efc56d0d931a3f8', '', '', '1', 'A'),
(153, 'Mariana Marcelino Moreira', 'marianamarcelinomoreira@hotmail.com', '20183022005', '13912680671', 'MG20309366', '35988397608', '1998-11-12', '70377cf2d89a3663e8e692016eac6f1f35ae76cb', '', '', '1', 'A');

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
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `idInscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;

--
-- AUTO_INCREMENT for table `palestrante`
--
ALTER TABLE `palestrante`
  MODIFY `idPalestrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simposio`
--
ALTER TABLE `simposio`
  MODIFY `idSimposio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simposista`
--
ALTER TABLE `simposista`
  MODIFY `idSimposista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

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
