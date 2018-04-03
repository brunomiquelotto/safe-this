<?php
class BaseModel
{
    public $form_data;
    public $form_msg;
    public $form_confirm;
    public $db;
    public $controller;
    public $parameters;
    public $userdata;
    
    public static function all() {
        $db = new DB();
        return $db->query('SELECT * FROM ' . static::table)->fetchAll();
    }

    public static function find($id) {
        $db = new DB();
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE ' . static::$primaryKey . ' = ' . $id)->fetchAll();
    }

    
}