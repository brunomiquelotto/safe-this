<?php

class VwOcurrencesUpdateModel extends BaseModel {
	protected static $table = "vw_ocurrences_update";
	protected static $primaryKey = null;
	protected $fields = array(
		'Ocurrence_Id',
		'Priority',
		'Status',
		'Description',
		'Place',
		'Opening_Date',
		'Files'

	);
}

?>