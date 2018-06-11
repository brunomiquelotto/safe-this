-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2018 às 20:55
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
CREATE DATABASE IF NOT EXISTS `safe_this_dev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
(1, 1, 'Vidro quebrado na loja ', '', '', 3, '2018-04-11 20:29:26', NULL),
(2, 8, 'Laboratório C4 - Aluno irritou-se com exercicio do prof. Sérgio e jogou o teclado no monitor.', '', '', 2, '2018-06-11 14:42:18', NULL),
(3, 1, 'Auditorio com cadeira quebrada ', '', '', 1, '2018-06-11 14:54:51', NULL),
(4, 8, 'Laboratório C4 - cachoeira de água direto no meu notebook, quero um novo, pra ontem!', 'diegoes_fioreis@uniararas.br', '', 3, '2018-06-11 14:59:51', NULL);

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
(1, 'Imagem inserida pelo Relator', '5b1eb17689e1c.jpg', 1),
(2, 'Imagem inserida pelo Relator', '5b1eb47a4a709.jpg', 2),
(3, 'Imagem inserida pelo Relator', '5b1eb76b38a22.jpg', 3),
(4, 'Imagem inserida pelo Relator', '5b1eb897a4582.jpg', 4);

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
(1, 1, NULL, 'A ocorrência foi registrada', 1, 3),
(2, 2, NULL, 'A ocorrência foi registrada', 1, 2),
(3, 3, NULL, 'A ocorrência foi registrada', 1, 1),
(4, 4, NULL, 'A ocorrência foi registrada', 1, 3);

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
(3, 'Analista de ocorrências', 0),
(4, 'Aluno', 0);

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
(1, 'Bloco A: Central'),
(2, 'Bloco B: Dr. Enio Vitali'),
(3, 'Bloco C: ISE - Clínica e Labs de Fisioterapia'),
(4, 'Bloco D: Jair D. Coletta'),
(5, 'Bloco E: ISE - EAD,Enferm, Estética e CEDOC'),
(6, 'Bloco F: Poliesportivo e Salas'),
(7, 'Bloco G: Farmácia-Ensino'),
(8, 'Bloco H: ISE - TI e Salas'),
(9, 'Bloco I: ISE - Psicologia e Salas'),
(10, 'Bloco J - Dr. Sérgio Roberto '),
(11, 'Bloco K: Jorge Hiroshi Murakami'),
(12, 'CEA: Centro de Experimentação Animal '),
(13, 'Portarias'),
(14, 'Restaurante'),
(15, 'Capela'),
(16, 'Bosque '),
(17, 'Logística EAD');

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
(1, 'Imagem do Setor', '5b1ea9c4259cf.jpg', 1),
(2, 'Imagem do Setor', '5b1ea9de0198d.jpg', 2),
(3, 'Imagem do Setor', '5b1eaa02a7a2f.jpg', 3),
(4, 'Imagem do Setor', '5b1eaa18195b8.jpg', 4),
(5, 'Imagem do Setor', '5b1eaa7f02de6.jpg', 5),
(6, 'Imagem do Setor', '5b1eaa96bdf7e.jpg', 6),
(7, 'Imagem do Setor', '5b1eaab862659.jpg', 7),
(8, 'Imagem do Setor', '5b1eab120ac80.jpg', 8),
(9, 'Imagem do Setor', '5b1eabc4b7715.jpg', 9),
(10, 'Imagem do Setor', '5b1eacd14545d.jpg', 10),
(11, 'Imagem do Setor', '5b1ead3a71f45.jpg', 11),
(12, 'Imagem do Setor', '5b1ead53c31e6.jpg', 12),
(13, 'Imagem do Setor', '5b1ead6b71a97.jpg', 13),
(14, 'Imagem do Setor', '5b1ead7880012.jpg', 14),
(15, 'Imagem do Setor', '5b1ead83acd6a.jpg', 15),
(16, 'Imagem do Setor', '5b1ead8f8014e.jpg', 16),
(17, 'Imagem do Setor', '5b1ead9e95c6d.jpg', 17);

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
(1, 'Administrador', 'admin@safethis.com', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 1, '2018-06-11 15:34:46', 'qsp0j2pc5n3bt8ah79ssqrbdag'),
(2, 'Moderador Silas', 'silas_mod@safethis.com', '$2a$08$0.ZcBHMTv.jyYaWlYACoaey4eL1M7stHUsY6tler9qm/046RsOJhi', 2, NULL, NULL),
(3, 'Análista Wallace', 'wallace_al@safethis.com', '$2a$08$NiaUOCzG/WR5akTE.4M3reyPtb8DFKrUrj5yzXcbep4wqvHiORG3O', 3, NULL, NULL),
(4, 'Análista Higor', 'higor_al@safethis.com', '$2a$08$ewlWOcHLCeKFkHxWJ2subOtNX0vhUNnLrXSAZkWgzSPJW.9Dz6XCy', 3, NULL, NULL),
(5, 'Analista Lucas', 'lucas_al@safethis.com', '$2a$08$Re6hsezKjjZUxDmpbzQ9ZeH1o6/j9EFrkG4W6ZYwejdxqP6SN9xeC', 3, NULL, NULL),
(6, 'Analista Robert', 'robert_al@safethis.com', '$2a$08$GKJ7gFSGTz87gLvsC3Yyvez8/m5OHd0T2yCBCNPsyLCuqm9gDmtGC', 3, NULL, NULL),
(7, 'Analista Bruno', 'bruno_al@safethis.com', '$2a$08$AuXnt3/PGIOTe6RZjqCK7.sMCuWso3wFUwwbxYLjjuJlbQfKE14Ge', 3, NULL, NULL);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrences_update`  AS  select `a`.`Ocurrence_Id` AS `Id`,`a`.`Description` AS `Description`,`sec`.`Name` AS `Place`,`a`.`Opening_Date` AS `Opening_Date`,`oup`.`Status_Feedback` AS `Status_Feedback`,`oup`.`Responsible` AS `Responsible`,`stat`.`Description` AS `Status`,`prio`.`Description` AS `Priority` from (((((`tb_ocurrences` `a` join `vw_last_ocurrences` `b` on((`a`.`Ocurrence_Id` = `b`.`Ocurrence_Id`))) join `tb_ocurrence_updates` `oup` on((`oup`.`Ocurrence_Update_Id` = `b`.`Ocurrence_Update_Id`))) left join `tb_ocurrence_statuses` `stat` on((`oup`.`Ocurrence_Status_Id` = `stat`.`Ocurrence_Status_Id`))) left join `tb_ocurrence_priorities` `prio` on((`oup`.`Ocurrence_Priority_Id` = `prio`.`Ocurrence_Priority_Id`))) join `tb_sectors` `sec` on((`sec`.`Sector_Id` = `a`.`Sector_Id`))) order by `a`.`Ocurrence_Id` desc ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ocurrence_status`
--
DROP TABLE IF EXISTS `vw_ocurrence_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrence_status`  AS  select `a`.`Ocurrence_Id` AS `Ocurrence_Id`,(select `tb_ocurrence_priorities`.`Description` from `tb_ocurrence_priorities` where (`tb_ocurrence_priorities`.`Ocurrence_Priority_Id` = `a`.`Ocurrence_Priority_Id`)) AS `Priority`,(select `tb_ocurrence_statuses`.`Description` from `tb_ocurrence_statuses` where (`tb_ocurrence_statuses`.`Ocurrence_Status_Id` = `a`.`Ocurrence_Status_Id`)) AS `Status`,`b`.`Description` AS `Description`,(select `tb_sectors`.`Name` from `tb_sectors` where (`tb_sectors`.`Sector_Id` = `b`.`Sector_Id`)) AS `Place`,`b`.`Opening_Date` AS `Opening_Date` from (`tb_ocurrence_updates` `a` join `tb_ocurrences` `b` on(((`a`.`Ocurrence_Status_Id` = (select max(`tb_ocurrence_updates`.`Ocurrence_Status_Id`) from `tb_ocurrence_updates` where (`tb_ocurrence_updates`.`Ocurrence_Status_Id` = `a`.`Ocurrence_Status_Id`))) and (`a`.`Ocurrence_Id` = `b`.`Ocurrence_Id`)))) group by `a`.`Ocurrence_Id` order by `a`.`Ocurrence_Id` desc ;

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
  MODIFY `Ocurrence_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ocurrence_files`
--
ALTER TABLE `tb_ocurrence_files`
  MODIFY `Ocurrence_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `Ocurrence_Update_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_permissions`
--
ALTER TABLE `tb_permissions`
  MODIFY `Permission_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  MODIFY `Profile_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_profile_permissions`
--
ALTER TABLE `tb_profile_permissions`
  MODIFY `User_Permission_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_sectors`
--
ALTER TABLE `tb_sectors`
  MODIFY `Sector_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_sector_files`
--
ALTER TABLE `tb_sector_files`
  MODIFY `Sector_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
