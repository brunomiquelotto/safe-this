CREATE TABLE `safe_this_dev`.`tb_ocurrence_status_flow` (
  `OcurrenceStatusFlowId` INT NOT NULL AUTO_INCREMENT,
  `Current_Status` INT NOT NULL,
  `Next_Status` INT NOT NULL,
  `Description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`OcurrenceStatusFlowId`),
  INDEX `FK_TB_STATUSES_TB_FLOW_idx` (`Current_Status` ASC),
  INDEX `FK_TB_STATUSES_TB_FLOW_NEXT_idx` (`Next_Status` ASC),
  CONSTRAINT `FK_TB_STATUSES_TB_FLOW`
    FOREIGN KEY (`Current_Status`)
    REFERENCES `safe_this_dev`.`tb_ocurrence_statuses` (`Ocurrence_Status_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_TB_STATUSES_TB_FLOW_NEXT`
    FOREIGN KEY (`Next_Status`)
    REFERENCES `safe_this_dev`.`tb_ocurrence_statuses` (`Ocurrence_Status_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO TB_OCURRENCE_STATUS_FLOW (Current_Status, Next_Status, Description)
VALUES
(1, 2, 'Rejeitar'),
(1, 3, 'Aprovar'),
(3, 4, 'Começar'),
(4, 5, 'Finalizar')
