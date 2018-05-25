<?php

class VwSectorListInfoModel extends BaseModel {
    protected static $table = "vw_sectors_list_info";
    protected static $primaryKey = null;
    protected $fields = array(
        'Sector_Id',
        'Name',
        'Open_Ocurrences',
        'Last_Ocurrence'
    );
}
?>