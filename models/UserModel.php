<?php

class UserModel extends BaseModel {
    protected static $table = "tb_users";
    protected static $primaryKey = "User_Id";
    protected $fields = array(
        'Name',
        'User_Id',
        'Email',
        'Password',
        'Profile_Id',
        'Last_Activity'
    );
}
?>