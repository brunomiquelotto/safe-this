<?php

class ProfileModel extends BaseModel {
    protected static $table = 'TB_PROFILES';
    protected static $primaryKey = 'Profile_Id';
    protected $fields = array(
        'Profile_Id',
        'Description',
        'FullAccess'
    );
}

?>