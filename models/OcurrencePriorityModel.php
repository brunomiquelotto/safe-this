<?php 
class OcurrencePriorityModel extends BaseModel {
	protected static $table = "TB_OCURRENCE_PRIORITIES";
	protected static $primaryKey = "Ocurrence_Priority_Id";
	protected $fields = array(
		"Ocurrence_Priority_Id",
		"Description"
	);
	public static function Statuses() {
		return (object)array(
			'Low' => 1,
			'Medium' => 2,
			'High' => 3
		);
	}
}

?>
