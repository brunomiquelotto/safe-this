<?php

class UserModel extends BaseModel {
    protected static $table = "Users";
    protected static $primaryKey = "user_id";
    protected $fields = array(
        'user_name',
        'user_id',
        'user',
        'user_password',
        'email'
    );
}

?>