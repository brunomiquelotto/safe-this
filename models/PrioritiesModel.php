<?php

class PrioritiesModel extends BaseModel {
    protected static $table = 'TB_OCURRENCE_PRIORITIES';
    protected static $primaryKey = 'Ocurrence_Priority_Id';
    protected $fields = array(
        'Ocurrence_Priority_Id',
        'Description'
    );
}

?>