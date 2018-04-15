<?php 
class OcurrenceUpdateModel extends BaseModel {
	protected static $table = "TB_OCURRENCE_UPDATES";
	protected static $primaryKey = "Ocurrence_Update_Id";
	protected $fields = array(
		"Ocurrence_Update_Id",
		"Ocurrence_Id",
		"Responsible",
		"Status_Feedback",
		"Ocurrence_Status_Id",
		"Update_Date"
	);
}

?>
