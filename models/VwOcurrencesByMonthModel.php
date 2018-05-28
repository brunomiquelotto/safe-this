<?php

class VwOcurrencesByMonthModel extends BaseModel {
	protected static $table = "vw_ocurrences_by_month";
	protected static $primaryKey = "month";
	protected $fields = array(
		'qty',
		'month'
	);
}

?>