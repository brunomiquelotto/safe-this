<?php

class PlaceModel extends BaseModel {
    protected static $table = 'tb_sectors';
    protected static $primaryKey = 'Sector_Id';
    protected $fields = array(
        'Sector_Id',
        'Name'
    );
}

?>