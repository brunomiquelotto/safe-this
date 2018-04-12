<?php
class BaseModel implements ArrayAccess
{
    public $form_data;
    public $form_msg;
    public $form_confirm;
    public $db;
    public $controller;
    public $parameters;
    public $userdata;

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function __construct($data) {
        $this->data = $data;
    }
    
    public static function all() {
        $db = new DB();
        return $db->query('SELECT * FROM ' . static::$table)->fetchAll();
    }

    public static function where($conditions) {
        $db = new DB();
        return $db->query('SELECT * FROM ' . static::$table . ' WHERE ' . $conditions)->fetchAll();
    }

    public static function find($id) {
        $db = new DB();
        $result = $db->query('SELECT * FROM ' . static::$table . ' WHERE ' . static::$primaryKey . ' = ' . $id)->fetchAll();
        if ($result && count($result) > 0) {
            return $result[0];
        }
        return false;
    }

    public static function delete($id) {
        $db = new DB();
        $db->delete(static::$table, static::$primaryKey, $id);
    }
    
    public function save() {
        $fields = $this->fields;
        $values = array();
        foreach ($fields as $key => $value) {
            if (array_key_exists($value, $this->data)) {
                $values[$value] = $this->data[$value];
            }
        }
        $db = new DB();
        if (array_key_exists(static::$primaryKey, $values) && $values[static::$primaryKey] > 0) {
            return $this->update($values, $db);
        } else {
            return $this->insert($values, $db);
        }
    }
    private function insert($values, $db) {
        if (!$db->insert(static::$table, $values)) {
            return $db->error;
        }
        return "Success";
    }
    private function update($values, $db) {
        if (!$db->update(static::$table, static::$primaryKey, $values[static::$primaryKey], $values)) {
            return $db->error;
        }
        return "Success";
    }
}