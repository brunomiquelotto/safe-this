<?php 
class OcurrencePriorityModel extends BaseModel {
	protected static $table = "tb_ocurrence_priorities";
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
