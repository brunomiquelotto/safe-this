<?php

class OcurrencesModel extends BaseModel {
    protected static $table = 'TB_OCURRENCES';
    protected static $primaryKey = 'Ocurrence_Id';
    protected $fields = array(
        'Ocurrence_Id',
        'Sector_Id',
        'Description',
        'Reporter_Email',
        'Reporter_CPF',
        'Ocurrence_Priority_Id',
        'Opening_Date',
        'Closing_Date'
    );
}

?>