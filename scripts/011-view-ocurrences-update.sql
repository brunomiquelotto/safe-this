CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ocurrences_update`  AS  
select `A`.`Ocurrence_Id` AS `Id`,
(select `tb_ocurrence_priorities`.`Description` from `tb_ocurrence_priorities` where (`tb_ocurrence_priorities`.`Ocurrence_Priority_Id` = `A`.`Ocurrence_Priority_Id`)) AS `Priority`,
(select `tb_ocurrence_statuses`.`Description` from `tb_ocurrence_statuses` where (`tb_ocurrence_statuses`.`Ocurrence_Status_Id` = `A`.`Ocurrence_Status_Id`)) AS `Status`,
`B`.`Description` AS `Description`,
(select `tb_sectors`.`Name` from `tb_sectors` where (`tb_sectors`.`Sector_Id` = `B`.`Sector_Id`)) AS `Place`,
`B`.`Opening_Date` AS `Opening_Date`,
(select `tb_users`.`Name` from `tb_users` where (`tb_users`.`User_Id` = `A`.`Responsible`)) AS `Responsible`,
`A`.`Status_Feedback` 

from (`tb_ocurrence_updates` `A` join `tb_ocurrences` `B` on((`A`.`Ocurrence_Id` = `B`.`Ocurrence_Id`))) ;

