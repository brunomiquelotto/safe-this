<?php 
class OcurrenceStatusModel extends BaseModel {
	protected static $table = "TB_OCURRENCE_STATUSES";
	protected static $primaryKey = "Ocurrence_Status_Id";
	protected $fields = array(
		"Ocurrence_Status_Id",
		"Description"
	);
	public static function Statuses() {
		return (object)array(
			'Waiting' => 1,
			'Rejected' => 2,
			'Accepted' => 3,
			'InProgress' => 4,
			'Done' => 5
		);
	}
}

?>
