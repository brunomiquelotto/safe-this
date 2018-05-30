<?php

class VwOcurrencesUpdateModel extends BaseModel {
	protected static $table = "vw_ocurrences_update";
	protected static $primaryKey = null;
	protected $fields = array(
		'Id',
		'Description',
		'Place',	
		'Opening_Date',
		'Status_Feedback',
		'Responsible',
		'Priority',
		'Status'
	);
}

?>