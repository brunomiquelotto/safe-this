ALTER TABLE `safe_this_dev`.`tb_ocurrence_files` 
DROP COLUMN `Ocurrence_Status_Id`,
CHANGE COLUMN `Ocurrence_Update_Id` `Ocurrence_Update_Id` INT(11) NOT NULL AFTER `Ocurrence_File_Id`;

ALTER TABLE `safe_this_dev`.`tb_ocurrence_updates` 
DROP FOREIGN KEY `FK_TB_OCURRENCE_UPDATES_TB_USERS`;
ALTER TABLE `safe_this_dev`.`tb_ocurrence_updates` 
CHANGE COLUMN `Responsible` `Responsible` INT(11) NULL ;
ALTER TABLE `safe_this_dev`.`tb_ocurrence_updates` 
ADD CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_USERS`
  FOREIGN KEY (`Responsible`)
  REFERENCES `safe_this_dev`.`tb_users` (`User_Id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE TB_USERS
ADD Session VARCHAR(100);