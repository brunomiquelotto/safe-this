<?php

class ProfilePermissionModel extends BaseModel {
    protected static $table = 'TB_PROFILE_PERMISSIONS';
    protected static $primaryKey = 'User_Permission_Id';
    protected $fields = array(
        'User_Permission_Id',
        'Permission_Id',
        'Profile_Id',
        'Granted'
    );
}

?>