USE `safe_this_dev`;
CREATE 
OR REPLACE ALGORITHM = UNDEFINED 
DEFINER = `root`@`localhost` 
SQL SECURITY DEFINER
VIEW `safe_this_dev`.`vw_ocurrences_table` AS
SELECT 
`oc`.`Ocurrence_Id` AS `Id`,
`oc`.`Description` AS `Description`,
`sec`.`Name` AS `Place`,
`sec`.`Sector_Id` AS `Place_Id`,
`ocs`.`Description` AS `Status`,
`ocp`.`Description` AS `Priority`,
COUNT(`ocf`.`Ocurrence_File_Id`) AS `Files`,
`ocp`.`Ocurrence_Priority_Id` AS `Ocurrence_Priority_Id`,
`ocs`.`Ocurrence_Status_Id` AS `Ocurrence_Status_Id`,
`oc`.`Opening_Date` AS `Opening_Date`
FROM
(((((`safe_this_dev`.`tb_ocurrences` `oc`
    LEFT JOIN `safe_this_dev`.`tb_ocurrence_updates` `ocu` ON ((`ocu`.`Ocurrence_Id` = `oc`.`Ocurrence_Id`)))
LEFT JOIN `safe_this_dev`.`tb_sectors` `sec` ON ((`sec`.`Sector_Id` = `oc`.`Sector_Id`)))
LEFT JOIN `safe_this_dev`.`tb_ocurrence_priorities` `ocp` ON ((`ocp`.`Ocurrence_Priority_Id` = `oc`.`Ocurrence_Priority_Id`)))
LEFT JOIN `safe_this_dev`.`tb_ocurrence_statuses` `ocs` ON ((`ocs`.`Ocurrence_Status_Id` = `ocu`.`Ocurrence_Status_Id`)))
LEFT JOIN `safe_this_dev`.`tb_ocurrence_files` `ocf` ON ((`ocu`.`Ocurrence_Update_Id` = `ocf`.`Ocurrence_Update_Id`)))
GROUP BY `oc`.`Ocurrence_Id` , `oc`.`Description`;