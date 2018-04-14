<?php
    class PlaceFileModel extends BaseModel {
        protected static $table = "TB_SECTOR_FILES";
        protected static $primaryKey = "Sector_File_Id";
        protected $fields = array(
            'Sector_File_Id',
            'Sector_Id',
            'Title',
            'FileName'
        );
    }
?>