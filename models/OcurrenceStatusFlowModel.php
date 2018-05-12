<?php 
	class OcurrenceStatusFlowModel extends BaseModel {
		protected static $table = "TB_OCURRENCE_STATUS_FLOW";
		protected static $primaryKey = "OcurrenceStatusFlowId";
		protected $fields = array(
			'Current_Status',
			'Next_Status',
			'Description'
		);
		protected static $requiredFields = array();
	}
?>