<?php

class PrioritiesModel extends BaseModel {
    protected static $table = 'tb_ocurrence_priorities';
    protected static $primaryKey = 'Ocurrence_Priority_Id';
    protected $fields = array(
        'Ocurrence_Priority_Id',
        'Description'
    );
}

?>