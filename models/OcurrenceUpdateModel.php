<?php 
class OcurrenceUpdateModel extends BaseModel {
	protected static $table = "tb_ocurrence_updates";
	protected static $primaryKey = "Ocurrence_Update_Id";
	protected $fields = array(
		"Ocurrence_Update_Id",
		"Ocurrence_Id",
		"Responsible",
		"Status_Feedback",
		"Ocurrence_Status_Id",
		"Ocurrence_Priority_Id",
		"Update_Date"
	);
}

?>
