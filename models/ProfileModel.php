<?php

class ProfileModel extends BaseModel {
    protected static $table = 'tb_profiles';
    protected static $primaryKey = 'Profile_Id';
    protected $fields = array(
        'Profile_Id',
        'Description',
        'FullAccess'
    );
}

?>