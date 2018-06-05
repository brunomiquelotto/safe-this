-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Jun-2018 às 02:56
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safe_this_dev`
--
CREATE DATABASE IF NOT EXISTS `safe_this_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `safe_this_dev`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrences`
--

CREATE TABLE `tb_ocurrences` (
  `Ocurrence_Id` int(11) NOT NULL,
  `Sector_Id` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Reporter_Email` varchar(80) DEFAULT NULL,
  `Reporter_CPF` varchar(11) DEFAULT NULL,
  `Ocurrence_Priority_Id` int(11) NOT NULL,
  `Opening_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Closing_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrences`
--

INSERT INTO `tb_ocurrences` (`Ocurrence_Id`, `Sector_Id`, `Description`, `Reporter_Email`, `Reporter_CPF`, `Ocurrence_Priority_Id`, `Opening_Date`, `Closing_Date`) VALUES
(5, 9, '1222', '', '', 3, '2018-04-16 21:25:47', NULL),
(6, 9, '1222', '', '', 3, '2018-04-16 21:26:04', NULL),
(7, 9, '1231321321', '', '', 3, '2018-04-16 21:26:51', NULL),
(8, 9, '1231321321', '', '', 3, '2018-04-16 21:27:02', NULL),
(9, 9, '1231321321', '', '', 3, '2018-04-16 21:29:09', NULL),
(10, 9, '1231321321', '', '', 3, '2018-04-16 21:29:48', NULL),
(11, 9, '1231321321', '', '', 3, '2018-04-16 21:31:45', NULL),
(12, 9, '1231321321', '', '', 3, '2018-04-16 21:33:33', NULL),
(13, 9, '1231321321', '', '', 3, '2018-04-16 21:39:54', NULL),
(14, 9, '1231321321', '', '', 3, '2018-04-16 21:40:07', NULL),
(15, 9, '1231321321', '', '', 3, '2018-04-16 21:41:21', NULL),
(16, 9, '1231321321', '', '', 3, '2018-04-16 21:44:27', NULL),
(17, 9, '1231321321', '', '', 3, '2018-04-16 21:44:32', NULL),
(18, 9, '1231321321', '', '', 3, '2018-04-16 21:44:32', NULL),
(19, 9, '1231321321', '', '', 3, '2018-04-16 21:44:33', NULL),
(20, 9, '1231321321', '', '', 3, '2018-04-16 21:44:33', NULL),
(21, 9, '1231321321', '', '', 3, '2018-04-16 21:44:34', NULL),
(22, 9, '1231321321', '', '', 3, '2018-04-16 21:44:34', NULL),
(23, 9, '1231321321', '', '', 3, '2018-02-16 21:44:34', NULL),
(24, 9, '1231321321', '', '', 3, '2018-04-16 21:44:35', NULL),
(25, 9, '1231321321', '', '', 3, '2018-04-16 21:44:35', NULL),
(26, 9, '1231321321', '', '', 3, '2018-04-16 21:44:36', NULL),
(27, 9, '1231321321', '', '', 3, '2018-04-16 21:44:36', NULL),
(28, 9, '1231321321', '', '', 3, '2018-04-16 21:44:36', NULL),
(29, 9, '1231321321', '', '', 3, '2018-04-16 21:44:37', NULL),
(30, 9, '1231321321', '', '', 3, '2018-04-16 21:44:37', NULL),
(31, 9, '1231321321', '', '', 3, '2018-04-16 21:44:38', NULL),
(32, 9, '1231321321', '', '', 3, '2018-04-16 21:44:38', NULL),
(33, 9, '1231321321', '', '', 3, '2018-04-16 21:44:38', NULL),
(34, 9, '1231321321', '', '', 3, '2018-04-16 21:46:11', NULL),
(35, 9, 'dasdkasdok', '', '', 3, '2018-04-16 23:23:42', NULL),
(36, 9, '12313112311', '', '', 3, '2018-04-17 19:10:32', NULL),
(37, 9, '1321321321', '', '', 3, '2018-04-17 19:11:30', NULL),
(38, 9, 'Telhado quebrado.', 'silascaxias@gmail.com', '455.970.348', 3, '2018-04-19 03:39:12', NULL),
(39, 11, 'teste', '', '', 3, '2018-04-19 03:48:17', NULL),
(40, 10, 'Quebrou tudo', '', '', 3, '2018-05-04 23:41:21', NULL),
(50, 9, 'teste new', '', '', 3, '2018-05-27 22:27:48', NULL),
(51, 9, 'qweqwewe', '', '', 3, '2018-05-27 22:34:07', NULL),
(52, 9, 'qweqwe', '', '', 3, '2018-05-27 22:35:58', NULL),
(53, 9, 'Deu muito ruim', 'silascaxias@gmail.com', '455.970.348', 3, '2018-05-28 14:24:47', NULL),
(54, 9, 'Deu muito ruim 2', '', '', 3, '2018-05-28 14:25:57', NULL),
(55, 9, 'Deu certo', '', '', 2, '2018-05-29 17:50:09', NULL),
(56, 11, 'Telhado quebradao', 'teste@teste.com', '455.970.348', 3, '2018-06-04 21:37:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrence_files`
--

CREATE TABLE `tb_ocurrence_files` (
  `Ocurrence_File_Id` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `FileName` varchar(200) NOT NULL,
  `Ocurrence_Update_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrence_files`
--

INSERT INTO `tb_ocurrence_files` (`Ocurrence_File_Id`, `Title`, `FileName`, `Ocurrence_Update_Id`) VALUES
(1, 'Imagem inserida pelo relator', '5ad83990ad721.jpg', 35),
(2, 'Imagem inserida pelo relator', '5ad83bb1ebd8a.png', 36),
(3, 'Imagem inserida pelo relator', '5ad83bb20367a.jpg', 36),
(4, 'Imagem inserida pelo relator', '5ad83bb222799.jpg', 36),
(5, 'Imagem inserida pelo Relator', '5b0c3b5fcd393.jpeg', 45),
(6, 'Imagem inserida pelo Relator', '5b0c3b5fd5644.jpg', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrence_priorities`
--

CREATE TABLE `tb_ocurrence_priorities` (
  `Ocurrence_Priority_Id` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrence_priorities`
--

INSERT INTO `tb_ocurrence_priorities` (`Ocurrence_Priority_Id`, `Description`) VALUES
(3, 'Alta'),
(1, 'Baixa'),
(2, 'Média');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrence_statuses`
--

CREATE TABLE `tb_ocurrence_statuses` (
  `Ocurrence_Status_Id` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrence_statuses`
--

INSERT INTO `tb_ocurrence_statuses` (`Ocurrence_Status_Id`, `Description`) VALUES
(3, 'Aceito'),
(1, 'Aguardando Análise'),
(4, 'Em andamento'),
(5, 'Finalizado'),
(2, 'Rejeitado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrence_status_flow`
--

CREATE TABLE `tb_ocurrence_status_flow` (
  `OcurrenceStatusFlowId` int(11) NOT NULL,
  `Current_Status` int(11) NOT NULL,
  `Next_Status` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Default_Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrence_status_flow`
--

INSERT INTO `tb_ocurrence_status_flow` (`OcurrenceStatusFlowId`, `Current_Status`, `Next_Status`, `Description`, `Default_Message`) VALUES
(1, 1, 2, 'Rejeitar', 'A ocorrência registrada não foi aceita.'),
(2, 1, 3, 'Aprovar', 'A ocorrência foi aprovada.'),
(3, 3, 4, 'Começar', 'Iniciando os trabalhos na ocorrência'),
(4, 4, 5, 'Finalizar', 'A ocorrência foi finalizada.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocurrence_updates`
--

CREATE TABLE `tb_ocurrence_updates` (
  `Ocurrence_Update_Id` int(11) NOT NULL,
  `Ocurrence_Id` int(11) NOT NULL,
  `Responsible` int(11) DEFAULT NULL,
  `Status_Feedback` varchar(200) DEFAULT NULL,
  `Ocurrence_Status_Id` int(11) NOT NULL,
  `Ocurrence_Priority_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ocurrence_updates`
--

INSERT INTO `tb_ocurrence_updates` (`Ocurrence_Update_Id`, `Ocurrence_Id`, `Responsible`, `Status_Feedback`, `Ocurrence_Status_Id`, `Ocurrence_Priority_Id`) VALUES
(1, 5, NULL, 'A ocorrência foi registrada', 1, 1),
(2, 6, NULL, 'A ocorrência foi registrada', 1, 1),
(3, 7, NULL, 'A ocorrência foi registrada', 1, 1),
(4, 8, NULL, 'A ocorrência foi registrada', 1, 1),
(5, 9, NULL, 'A ocorrência foi registrada', 1, 1),
(6, 10, NULL, 'A ocorrência foi registrada', 1, 1),
(7, 11, NULL, 'A ocorrência foi registrada', 1, 1),
(8, 12, NULL, 'A ocorrência foi registrada', 2, 1),
(9, 12, NULL, 'teste', 2, 1),
(10, 13, NULL, 'A ocorrência foi registrada', 2, 1),
(11, 14, NULL, 'A ocorrência foi registrada', 2, 1),
(12, 15, NULL, 'A ocorrência foi registrada', 2, 1),
(13, 16, NULL, 'A ocorrência foi registrada', 2, 1),
(14, 17, NULL, 'A ocorrência foi registrada', 2, 1),
(15, 18, NULL, 'A ocorrência foi registrada', 2, 1),
(16, 19, NULL, 'A ocorrência foi registrada', 2, 1),
(17, 20, NULL, 'A ocorrência foi registrada', 2, 1),
(18, 21, NULL, 'A ocorrência foi registrada', 2, 1),
(19, 22, NULL, 'A ocorrência foi registrada', 2, 1),
(20, 23, NULL, 'A ocorrência foi registrada', 2, 1),
(21, 24, NULL, 'A ocorrência foi registrada', 2, 1),
(22, 25, NULL, 'A ocorrência foi registrada', 2, 1),
(23, 26, NULL, 'A ocorrência foi registrada', 2, 1),
(24, 27, NULL, 'A ocorrência foi registrada', 2, 1),
(25, 28, NULL, 'A ocorrência foi registrada', 2, 1),
(26, 29, NULL, 'A ocorrência foi registrada', 2, 1),
(27, 30, NULL, 'A ocorrência foi registrada', 2, 1),
(28, 31, NULL, 'A ocorrência foi registrada', 2, 1),
(29, 32, NULL, 'A ocorrência foi registrada', 2, 1),
(30, 33, NULL, 'A ocorrência foi registrada', 2, 1),
(31, 34, NULL, 'A ocorrência foi registrada', 2, 1),
(32, 35, NULL, 'A ocorrência foi registrada', 1, 1),
(33, 36, NULL, 'A ocorrência foi registrada', 1, 1),
(34, 37, NULL, 'A ocorrência foi registrada', 1, 1),
(35, 38, NULL, 'A ocorrência foi registrada', 1, 1),
(36, 39, NULL, 'A ocorrência foi registrada', 1, 1),
(37, 40, NULL, 'A ocorrência foi registrada', 1, 1),
(38, 50, NULL, 'A ocorrência foi registrada', 1, 3),
(39, 51, NULL, 'A ocorrência foi registrada', 1, 3),
(40, 52, NULL, 'A ocorrência foi registrada', 1, 3),
(45, 53, NULL, 'A ocorrência foi registrada', 1, 3),
(48, 54, NULL, 'A ocorrência foi registrada', 1, 3),
(55, 39, 2, 'A ocorrência foi aprovada.', 3, 1),
(56, 39, 2, 'Iniciando os trabalhos na ocorrência', 4, 2),
(57, 39, 2, 'A ocorrência foi finalizada.', 5, 2),
(61, 54, 3, 'A ocorrência foi aprovada.', 3, 3),
(62, 53, 1, 'A ocorrência registrada não foi aceita.', 2, 3),
(63, 54, 3, 'Iniciando os trabalhos na ocorrência', 4, 3),
(64, 54, 3, 'A ocorrência foi finalizada.', 5, 3),
(65, 52, 2, 'A ocorrência foi aprovada.', 3, 3),
(66, 51, 3, 'A ocorrência foi aprovada.', 3, 3),
(67, 50, 1, 'A ocorrência foi aprovada.', 3, 3),
(68, 52, 2, 'Iniciando os trabalhos na ocorrência', 4, 3),
(69, 51, 3, 'Iniciando os trabalhos na ocorrência', 4, 3),
(70, 52, 2, 'A ocorrência foi finalizada.', 5, 3),
(71, 51, 3, 'A ocorrência foi finalizada.', 5, 2),
(72, 38, 2, 'A ocorrência foi aprovada.', 3, 2),
(73, 11, 2, 'A ocorrência foi aprovada.', 3, 2),
(74, 50, 1, 'Iniciando os trabalhos na ocorrência', 4, 3),
(75, 50, 1, 'A ocorrência foi finalizada.', 5, 3),
(76, 55, NULL, 'A ocorrência foi registrada', 1, 2),
(77, 55, 2, 'A ocorrência foi aprovada.', 3, 3),
(78, 55, 2, 'Iniciando os trabalhos na ocorrência', 4, 3),
(79, 55, 2, 'A ocorrência foi finalizada.', 5, 3),
(80, 40, 2, 'A ocorrência foi aprovada.', 3, 1),
(81, 40, 2, 'Iniciando os trabalhos na ocorrência', 4, 2),
(82, 37, 1, 'A ocorrência foi aprovada.', 3, 3),
(83, 37, 1, 'Iniciando os trabalhos na ocorrência', 4, 2),
(84, 37, 2, 'A ocorrência foi finalizada.', 5, 1),
(85, 36, 1, 'A ocorrência foi aprovada.', 3, 1),
(86, 40, 2, 'A ocorrência foi finalizada.', 5, 1),
(87, 56, NULL, 'A ocorrência foi registrada', 1, 3),
(88, 56, 1, 'A ocorrência foi aprovada.', 3, 1),
(89, 56, 3, 'Iniciando os trabalhos na ocorrência', 4, 2),
(90, 56, 3, 'A ocorrência foi finalizada.', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissions`
--

CREATE TABLE `tb_permissions` (
  `Permission_Id` int(11) NOT NULL,
  `Controller` varchar(45) DEFAULT NULL,
  `Action` varchar(45) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_permissions`
--

INSERT INTO `tb_permissions` (`Permission_Id`, `Controller`, `Action`, `Description`) VALUES
(1, 'AdminController', 'Index', 'Painel Administrativo'),
(2, 'PlacesController', 'Index', 'Visualizar Setores'),
(3, 'PlacesController', 'Create', 'Criar Setores'),
(4, 'PlacesController', 'Save', 'Salvar Setores'),
(5, 'PlacesController', 'Delete', 'Apagar Setores'),
(6, 'PlacesController', 'Edit', 'Editar Setores'),
(7, 'ReportsController', 'Index', 'Página Relatórios'),
(8, 'ReportsController', 'View', 'Visualizar os Relatórios'),
(9, 'UsersController', 'Index', 'Visualizar usuários'),
(10, 'UsersController', 'Edit', 'Editar usuários'),
(11, 'UsersController', 'Create', 'Criar usuários'),
(12, 'UsersController', 'Delete', 'Remover usuários'),
(13, 'UsersController', 'Save', 'Salvar usuários');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `Profile_Id` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `FullAccess` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_profiles`
--

INSERT INTO `tb_profiles` (`Profile_Id`, `Description`, `FullAccess`) VALUES
(1, 'Administrador', 1),
(2, 'Moderador', 0),
(25, 'Analista de ocorrências', 0),
(27, 'Aluno', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_profile_permissions`
--

CREATE TABLE `tb_profile_permissions` (
  `User_Permission_Id` int(11) NOT NULL,
  `Permission_Id` int(11) NOT NULL,
  `Granted` tinyint(4) NOT NULL DEFAULT '0',
  `Profile_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_profile_permissions`
--

INSERT INTO `tb_profile_permissions` (`User_Permission_Id`, `Permission_Id`, `Granted`, `Profile_Id`) VALUES
(77, 1, 0, 2),
(78, 2, 0, 2),
(79, 7, 0, 2),
(80, 8, 0, 2),
(81, 9, 0, 2),
(82, 1, 0, NULL),
(83, 7, 0, NULL),
(84, 8, 0, NULL),
(85, 9, 0, NULL),
(86, 1, 0, NULL),
(87, 2, 0, NULL),
(92, 1, 0, 25),
(93, 2, 0, 25),
(94, 7, 0, 25),
(95, 8, 0, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sectors`
--

CREATE TABLE `tb_sectors` (
  `Sector_Id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sectors`
--

INSERT INTO `tb_sectors` (`Sector_Id`, `Name`) VALUES
(9, 'ISE'),
(10, 'Central'),
(11, 'Teste'),
(12, 'Casa do Silas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sector_files`
--

CREATE TABLE `tb_sector_files` (
  `Sector_File_Id` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `FileName` varchar(200) NOT NULL,
  `Sector_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sector_files`
--

INSERT INTO `tb_sector_files` (`Sector_File_Id`, `Title`, `FileName`, `Sector_Id`) VALUES
(9, 'Imagem do Setor', '5ad16c47f41ee.jpg', 9),
(10, 'Imagem do Setor', '5ad51d59f135c.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Profile_Id` int(11) NOT NULL,
  `Last_Activity` datetime DEFAULT NULL,
  `Session` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`User_Id`, `Name`, `Email`, `Password`, `Profile_Id`, `Last_Activity`, `Session`) VALUES
(1, 'Administrador', 'admin@safethis.com', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 1, '2018-06-04 21:35:51', '7c0c46db52918a5c23ea392a5967a06d'),
(2, 'Moderador Silas', 'moderador@safethis.com', '$2a$08$Ak4JkUERWb7.2.H64vtYQujc9F/V1dKIxq88aroHE.G9wJ4ysyN0K', 2, NULL, NULL),
(3, 'Analista Silas', 'silas@safethis.com', '$2a$08$mFJ7sAKZ/GMj39bV67hc.O0VrihmjX66IfXTufUbuuRwGbe6bRW3.', 25, NULL, NULL),
(4, 'Administrador Silas', 'admsilas@safethis.com', '$2a$08$9jGCbx7kj.uGSEtWVjB.9Ori8UX.hKkRmrF.NDnGqla81Q3QgkST6', 1, NULL, NULL),
(5, 'Atirador Silas', 'silao@safethis.com', '$2a$08$Z5uzVWRhajMRAnRzwWTej.9MmzcOm6CGzFhhiShQh50qkkKkuzazS', 1, NULL, NULL),
(6, 'Teste Mensagem', 'bmiquelotto@safethis.com', '$2a$08$mwYzNl2FISljOVHouypmOOobXpve1MVnjx39H/.IqvPZkbmCtUKb.', 2, NULL, NULL),
(8, 'Testezão da mensagem', 'bruno.miquelotto.bm@gmail.com', '$2a$08$OirybLJD/XlmH/.caOY49urx9ryJRBM1PNTAz6hChK4wRBuiyYx5i', 1, NULL, NULL),
(9, 'cara x', 'x@safethis.com', '$2a$08$c8czAa3Lj0W388aeaeQkSuu3kJv9O4Zb3RVpx9N8fW.qvwYpqhM6a', 2, NULL, NULL),
(11, 'cara z', 'z@safethis.com', '$2a$08$bijwPY4yoktmj9vtMiU0ZuVqyNpO5Exac/hvm1XKZdowNtVtA4rym', 1, NULL, NULL),
(13, 'oi', '12321312@kaspodkaps', '$2a$08$9Vo.KojfbsY4EzgypetbwuderR3YqgZlp9x9pj9iluwm2JtJErXsa', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_last_ocurrences`
-- (See below for the actual view)
--
CREATE TABLE `vw_last_ocurrences` (
`Ocurrence_Id` int(11)
,`Ocurrence_Update_Id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ocurrences_by_month`
-- (See below for the actual view)
--
CREATE TABLE `vw_ocurrences_by_month` (
`qty` bigint(21)
,`month` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ocurrences_table`
-- (See below for the actual view)
--
CREATE TABLE `vw_ocurrences_table` (
`Id` int(11)
,`Description` varchar(200)
,`Place` varchar(45)
,`Place_Id` int(11)
,`Status` varchar(45)
,`Priority` varchar(45)
,`Files` bigint(21)
,`Ocurrence_Priority_Id` int(11)
,`Ocurrence_Status_Id` int(11)
,`Opening_Date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ocurrences_update`
-- (See below for the actual view)
--
CREATE TABLE `vw_ocurrences_update` (
`Id` int(11)
,`Description` varchar(200)
,`Place` varchar(45)
,`Opening_Date` datetime
,`Status_Feedback` varchar(200)
,`Responsible` int(11)
,`Status` varchar(45)
,`Priority` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ocurrence_status`
-- (See below for the actual view)
--
CREATE TABLE `vw_ocurrence_status` (
`Ocurrence_Id` int(11)
,`Priority` varchar(45)
,`Status` varchar(45)
,`Description` varchar(200)
,`Place` varchar(45)
,`Opening_Date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sectors_list_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_sectors_list_info` (
`Sector_Id` int(11)
,`Name` varchar(45)
,`Open_Ocurrences` bigint(21)
,`Last_Ocurrence` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_permission`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_permission` (
`User_Id` int(11)
,`Controller` varchar(45)
,`Action` varchar(45)
,`Description` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_profiles`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_profiles` (
`User_Id` int(11)
,`Name` varchar(45)
,`Profile_Id` int(11)
,`Description` varchar(45)
,`FullAccess` tinyint(4)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_last_ocurrences`
--
DROP TABLE IF EXISTS `vw_last_ocurrences`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_last_ocurrences`  AS  select max(`oup`.`Ocurrence_Id`) AS `Ocurrence_Id`,max(`oup`.`Ocurrence_Update_Id`) AS `Ocurrence_Update_Id` from `tb_ocurrence_updates` `oup` group by `oup`.`Ocurrence_Id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ocurrences_by_month`
--
DROP TABLE IF EXISTS `vw_ocurrences_by_month`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrences_by_month`  AS  select count(1) AS `qty`,concat(year(`tb_ocurrences`.`Opening_Date`),'-',month(`tb_ocurrences`.`Opening_Date`)) AS `month` from `tb_ocurrences` group by concat(year(`tb_ocurrences`.`Opening_Date`),'-',month(`tb_ocurrences`.`Opening_Date`)) order by concat(year(`tb_ocurrences`.`Opening_Date`),'-',month(`tb_ocurrences`.`Opening_Date`)) desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ocurrences_table`
--
DROP TABLE IF EXISTS `vw_ocurrences_table`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrences_table`  AS  select `oc`.`Ocurrence_Id` AS `Id`,`oc`.`Description` AS `Description`,`sec`.`Name` AS `Place`,`sec`.`Sector_Id` AS `Place_Id`,`ocs`.`Description` AS `Status`,`ocp`.`Description` AS `Priority`,count(`ocf`.`Ocurrence_File_Id`) AS `Files`,`ocp`.`Ocurrence_Priority_Id` AS `Ocurrence_Priority_Id`,`ocs`.`Ocurrence_Status_Id` AS `Ocurrence_Status_Id`,`oc`.`Opening_Date` AS `Opening_Date` from (((((`tb_ocurrences` `oc` left join `tb_ocurrence_updates` `ocu` on((`ocu`.`Ocurrence_Id` = `oc`.`Ocurrence_Id`))) left join `tb_sectors` `sec` on((`sec`.`Sector_Id` = `oc`.`Sector_Id`))) left join `tb_ocurrence_priorities` `ocp` on((`ocp`.`Ocurrence_Priority_Id` = `oc`.`Ocurrence_Priority_Id`))) left join `tb_ocurrence_statuses` `ocs` on((`ocs`.`Ocurrence_Status_Id` = `ocu`.`Ocurrence_Status_Id`))) left join `tb_ocurrence_files` `ocf` on((`ocu`.`Ocurrence_Update_Id` = `ocf`.`Ocurrence_Update_Id`))) group by `oc`.`Ocurrence_Id`,`oc`.`Description` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ocurrences_update`
--
DROP TABLE IF EXISTS `vw_ocurrences_update`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrences_update`  AS  select `A`.`Ocurrence_Id` AS `Id`,`A`.`Description` AS `Description`,`sec`.`Name` AS `Place`,`A`.`Opening_Date` AS `Opening_Date`,`oup`.`Status_Feedback` AS `Status_Feedback`,`oup`.`Responsible` AS `Responsible`,`stat`.`Description` AS `Status`,`prio`.`Description` AS `Priority` from (((((`tb_ocurrences` `A` join `vw_last_ocurrences` `B` on((`A`.`Ocurrence_Id` = `B`.`Ocurrence_Id`))) join `tb_ocurrence_updates` `oup` on((`oup`.`Ocurrence_Update_Id` = `B`.`Ocurrence_Update_Id`))) left join `tb_ocurrence_statuses` `stat` on((`oup`.`Ocurrence_Status_Id` = `stat`.`Ocurrence_Status_Id`))) left join `tb_ocurrence_priorities` `prio` on((`oup`.`Ocurrence_Priority_Id` = `prio`.`Ocurrence_Priority_Id`))) join `tb_sectors` `sec` on((`sec`.`Sector_Id` = `A`.`Sector_Id`))) order by `A`.`Ocurrence_Id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ocurrence_status`
--
DROP TABLE IF EXISTS `vw_ocurrence_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrence_status`  AS  select `A`.`Ocurrence_Id` AS `Ocurrence_Id`,(select `tb_ocurrence_priorities`.`Description` from `tb_ocurrence_priorities` where (`tb_ocurrence_priorities`.`Ocurrence_Priority_Id` = `A`.`Ocurrence_Priority_Id`)) AS `Priority`,(select `tb_ocurrence_statuses`.`Description` from `tb_ocurrence_statuses` where (`tb_ocurrence_statuses`.`Ocurrence_Status_Id` = `A`.`Ocurrence_Status_Id`)) AS `Status`,`B`.`Description` AS `Description`,(select `tb_sectors`.`Name` from `tb_sectors` where (`tb_sectors`.`Sector_Id` = `B`.`Sector_Id`)) AS `Place`,`B`.`Opening_Date` AS `Opening_Date` from (`tb_ocurrence_updates` `A` join `tb_ocurrences` `B` on(((`A`.`Ocurrence_Status_Id` = (select max(`tb_ocurrence_updates`.`Ocurrence_Status_Id`) from `tb_ocurrence_updates` where (`tb_ocurrence_updates`.`Ocurrence_Status_Id` = `A`.`Ocurrence_Status_Id`))) and (`A`.`Ocurrence_Id` = `B`.`Ocurrence_Id`)))) group by `A`.`Ocurrence_Id` order by `A`.`Ocurrence_Id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sectors_list_info`
--
DROP TABLE IF EXISTS `vw_sectors_list_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sectors_list_info`  AS  select `sector`.`Sector_Id` AS `Sector_Id`,`sector`.`Name` AS `Name`,count(`ocurr`.`Ocurrence_Id`) AS `Open_Ocurrences`,max(`ocurr`.`Opening_Date`) AS `Last_Ocurrence` from ((`tb_sectors` `sector` left join `tb_ocurrences` `ocurr` on((`ocurr`.`Sector_Id` = `sector`.`Sector_Id`))) left join `tb_ocurrence_updates` `up` on(((`ocurr`.`Ocurrence_Id` = `up`.`Ocurrence_Id`) and (`up`.`Ocurrence_Status_Id` = 1)))) group by `sector`.`Sector_Id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_permission`
--
DROP TABLE IF EXISTS `vw_user_permission`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_permission`  AS  select `users`.`User_Id` AS `User_Id`,`permissions`.`Controller` AS `Controller`,`permissions`.`Action` AS `Action`,`permissions`.`Description` AS `Description` from (((`tb_users` `users` join `tb_profiles` `profiles` on((`profiles`.`Profile_Id` = `users`.`Profile_Id`))) join `tb_profile_permissions` `profilepermissions` on((`profilepermissions`.`Profile_Id` = `profiles`.`Profile_Id`))) join `tb_permissions` `permissions` on((`permissions`.`Permission_Id` = `profilepermissions`.`Permission_Id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_profiles`
--
DROP TABLE IF EXISTS `vw_user_profiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_profiles`  AS  select `users`.`User_Id` AS `User_Id`,`users`.`Name` AS `Name`,`profiles`.`Profile_Id` AS `Profile_Id`,`profiles`.`Description` AS `Description`,`profiles`.`FullAccess` AS `FullAccess` from (`tb_users` `users` join `tb_profiles` `profiles` on((`profiles`.`Profile_Id` = `users`.`Profile_Id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ocurrences`
--
ALTER TABLE `tb_ocurrences`
  ADD PRIMARY KEY (`Ocurrence_Id`),
  ADD KEY `FK_TB_OCURRENCES_TB_SECTORS_idx` (`Sector_Id`),
  ADD KEY `FK_TB_OCURRENCES_TB_OCURRENCE_PRIORITIES_idx` (`Ocurrence_Priority_Id`);

--
-- Indexes for table `tb_ocurrence_files`
--
ALTER TABLE `tb_ocurrence_files`
  ADD PRIMARY KEY (`Ocurrence_File_Id`),
  ADD KEY `FK_TB_OCURRENCE_FILE_TB_OCURRENCE_UPDATE_idx` (`Ocurrence_Update_Id`);

--
-- Indexes for table `tb_ocurrence_priorities`
--
ALTER TABLE `tb_ocurrence_priorities`
  ADD PRIMARY KEY (`Ocurrence_Priority_Id`),
  ADD UNIQUE KEY `Description_UNIQUE` (`Description`);

--
-- Indexes for table `tb_ocurrence_statuses`
--
ALTER TABLE `tb_ocurrence_statuses`
  ADD PRIMARY KEY (`Ocurrence_Status_Id`),
  ADD UNIQUE KEY `Description_UNIQUE` (`Description`);

--
-- Indexes for table `tb_ocurrence_status_flow`
--
ALTER TABLE `tb_ocurrence_status_flow`
  ADD PRIMARY KEY (`OcurrenceStatusFlowId`),
  ADD KEY `FK_TB_STATUSES_TB_FLOW_idx` (`Current_Status`),
  ADD KEY `FK_TB_STATUSES_TB_FLOW_NEXT_idx` (`Next_Status`);

--
-- Indexes for table `tb_ocurrence_updates`
--
ALTER TABLE `tb_ocurrence_updates`
  ADD PRIMARY KEY (`Ocurrence_Update_Id`),
  ADD KEY `FK_TB_OCURRENCES_idx` (`Ocurrence_Id`),
  ADD KEY `FK_TB_OCURRENCE_UPDATES_TB_USERS_idx` (`Responsible`),
  ADD KEY `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCE_STATUSES_idx` (`Ocurrence_Status_Id`),
  ADD KEY `FK_TB_OCURRENCE_UPDATE_TB_OCURRENCE_PRIORITY` (`Ocurrence_Priority_Id`);

--
-- Indexes for table `tb_permissions`
--
ALTER TABLE `tb_permissions`
  ADD PRIMARY KEY (`Permission_Id`);

--
-- Indexes for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`Profile_Id`),
  ADD UNIQUE KEY `Description_UNIQUE` (`Description`);

--
-- Indexes for table `tb_profile_permissions`
--
ALTER TABLE `tb_profile_permissions`
  ADD PRIMARY KEY (`User_Permission_Id`),
  ADD KEY `FK_TB_USER_PERMISSIONS_TB_PERMISSIONS_idx` (`Permission_Id`),
  ADD KEY `FK_TB_USER_PERMISSION_TB_PROFILES_idx` (`Profile_Id`);

--
-- Indexes for table `tb_sectors`
--
ALTER TABLE `tb_sectors`
  ADD PRIMARY KEY (`Sector_Id`);

--
-- Indexes for table `tb_sector_files`
--
ALTER TABLE `tb_sector_files`
  ADD PRIMARY KEY (`Sector_File_Id`),
  ADD KEY `FK_TB_SECTOR_FILES_TB_SECTORS_idx` (`Sector_Id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `FK_TB_USERS_TB_PROFILES_idx` (`Profile_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ocurrences`
--
ALTER TABLE `tb_ocurrences`
  MODIFY `Ocurrence_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_ocurrence_files`
--
ALTER TABLE `tb_ocurrence_files`
  MODIFY `Ocurrence_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ocurrence_priorities`
--
ALTER TABLE `tb_ocurrence_priorities`
  MODIFY `Ocurrence_Priority_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ocurrence_statuses`
--
ALTER TABLE `tb_ocurrence_statuses`
  MODIFY `Ocurrence_Status_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ocurrence_status_flow`
--
ALTER TABLE `tb_ocurrence_status_flow`
  MODIFY `OcurrenceStatusFlowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ocurrence_updates`
--
ALTER TABLE `tb_ocurrence_updates`
  MODIFY `Ocurrence_Update_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_permissions`
--
ALTER TABLE `tb_permissions`
  MODIFY `Permission_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  MODIFY `Profile_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_profile_permissions`
--
ALTER TABLE `tb_profile_permissions`
  MODIFY `User_Permission_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_sectors`
--
ALTER TABLE `tb_sectors`
  MODIFY `Sector_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_sector_files`
--
ALTER TABLE `tb_sector_files`
  MODIFY `Sector_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_ocurrences`
--
ALTER TABLE `tb_ocurrences`
  ADD CONSTRAINT `FK_TB_OCURRENCES_TB_OCURRENCE_PRIORITIES` FOREIGN KEY (`Ocurrence_Priority_Id`) REFERENCES `tb_ocurrence_priorities` (`Ocurrence_Priority_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_OCURRENCES_TB_SECTORS` FOREIGN KEY (`Sector_Id`) REFERENCES `tb_sectors` (`Sector_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_ocurrence_files`
--
ALTER TABLE `tb_ocurrence_files`
  ADD CONSTRAINT `FK_TB_OCURRENCE_FILE_TB_OCURRENCE_UPDATE` FOREIGN KEY (`Ocurrence_Update_Id`) REFERENCES `tb_ocurrence_updates` (`Ocurrence_Update_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_ocurrence_status_flow`
--
ALTER TABLE `tb_ocurrence_status_flow`
  ADD CONSTRAINT `FK_TB_STATUSES_TB_FLOW` FOREIGN KEY (`Current_Status`) REFERENCES `tb_ocurrence_statuses` (`Ocurrence_Status_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_STATUSES_TB_FLOW_NEXT` FOREIGN KEY (`Next_Status`) REFERENCES `tb_ocurrence_statuses` (`Ocurrence_Status_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_ocurrence_updates`
--
ALTER TABLE `tb_ocurrence_updates`
  ADD CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCES` FOREIGN KEY (`Ocurrence_Id`) REFERENCES `tb_ocurrences` (`Ocurrence_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCE_STATUSES` FOREIGN KEY (`Ocurrence_Status_Id`) REFERENCES `tb_ocurrence_statuses` (`Ocurrence_Status_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_USERS` FOREIGN KEY (`Responsible`) REFERENCES `tb_users` (`User_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_OCURRENCE_UPDATE_TB_OCURRENCE_PRIORITY` FOREIGN KEY (`Ocurrence_Priority_Id`) REFERENCES `tb_ocurrence_priorities` (`Ocurrence_Priority_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_profile_permissions`
--
ALTER TABLE `tb_profile_permissions`
  ADD CONSTRAINT `FK_TB_USER_PERMISSIONS_TB_PERMISSIONS` FOREIGN KEY (`Permission_Id`) REFERENCES `tb_permissions` (`Permission_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TB_USER_PERMISSION_TB_PROFILES` FOREIGN KEY (`Profile_Id`) REFERENCES `tb_profiles` (`Profile_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_sector_files`
--
ALTER TABLE `tb_sector_files`
  ADD CONSTRAINT `FK_TB_SECTOR_FILES_TB_SECTORS` FOREIGN KEY (`Sector_Id`) REFERENCES `tb_sectors` (`Sector_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `FK_TB_USERS_TB_PROFILES` FOREIGN KEY (`Profile_Id`) REFERENCES `tb_profiles` (`Profile_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
