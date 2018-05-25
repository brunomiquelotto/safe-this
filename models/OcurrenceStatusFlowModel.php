<?php 
	class OcurrenceStatusFlowModel extends BaseModel {
		protected static $table = "tb_ocurrence_status_flow";
		protected static $primaryKey = "OcurrenceStatusFlowId";
		protected $fields = array(
			'Current_Status',
			'Next_Status',
			'Description'
		);
		protected static $requiredFields = array();
	}
?>