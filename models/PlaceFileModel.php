<?php
    class PlaceFileModel extends BaseModel {
        protected static $table = "tb_sector_files";
        protected static $primaryKey = "Sector_File_Id";
        protected $fields = array(
            'Sector_File_Id',
            'Sector_Id',
            'Title',
            'FileName'
        );
    }
?>