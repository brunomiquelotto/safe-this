<?php 
	class OcurrenceFileModel extends BaseModel {
		protected static $table = "tb_ocurrence_files";
		protected static $primaryKey = "Ocurrence_File_Id";
		protected $fields = array(
			'Ocurrence_File_Id',
			'Ocurrence_Status_Id',
			'Title',
			'FileName',
			'Ocurrence_Update_Id'
		);
		protected static $requiredFields = array(
			'Ocurrence_Status_Id',
			'Title',
			'FileName',
			'Ocurrence_Update_Id'
		);
	}
?>