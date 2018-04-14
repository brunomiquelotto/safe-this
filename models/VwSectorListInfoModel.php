<?php

class VwSectorListInfoModel extends BaseModel {
    protected static $table = "Vw_Sectors_List_Info";
    protected static $primaryKey = null;
    protected $fields = array(
        'Sector_Id',
        'Name',
        'Open_Ocurrences',
        'Last_Ocurrence'
    );
}
?>