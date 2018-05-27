<?php

class ProfilePermissionModel extends BaseModel {
    protected static $table = 'tb_profile_permissions';
    protected static $primaryKey = 'User_Permission_Id';
    protected $fields = array(
        'User_Permission_Id',
        'Permission_Id',
        'Profile_Id',
        'Granted'
    );
}

?>