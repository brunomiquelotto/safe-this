<?php

class PlaceModel extends BaseModel {
    protected static $table = 'TB_SECTORS';
    protected static $primaryKey = 'Sector_Id';
    protected $fields = array(
        'Sector_Id',
        'Name'
    );
}

?>