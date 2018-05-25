<?php

class OcurrencesModel extends BaseModel {
    protected static $table = 'tb_ocurrences';
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
    protected static $requiredFields = array(
        'Sector_Id',
        'Ocurrence_Priority_Id'
    );
}

?>