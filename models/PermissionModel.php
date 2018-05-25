<?php

class PermissionModel extends BaseModel {
    protected static $table = 'tb_permissio';
    protected static $primaryKey = 'Permission_Id';
    protected $fields = array(
        'Permission_Id',
        'Controller',
        'Action',
        'Description'
    );
}

?>