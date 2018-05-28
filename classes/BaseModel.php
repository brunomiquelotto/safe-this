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

    private $querySql;
    private $limit;

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

    public static function stmt_limit($stmt, $number, $skip = false) {
        if ($skip) {
            $limit = 'LIMIT ' . $skip . ', ' . $number;
        } else {
           $limit = 'LIMIT ' . $number; 
       }

       $db = new DB();
       return $db->query('SELECT * FROM ' . static::$table . ' ' . $stmt . ' ' . $limit)->fetchAll();
   }

   public static function where($conditions) {
    $db = new DB();
    return $db->query('SELECT * FROM ' . static::$table . ' WHERE ' . $conditions)->fetchAll();
}

public static function whereGroupBy($conditions) {
    $db = new DB();
    return $db->query('SELECT Place,
       COUNT(
       CASE WHEN Ocurrence_Status_Id = 1 THEN 1 ELSE NULL
       END) as "Aguardando",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 2 THEN 1 ELSE NULL
       END
       ) as "Rejeitado",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 3 THEN 1 ELSE NULL
       END
       ) as "Aceito",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 4 THEN 1 ELSE NULL
       END
       ) as "Andamento",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 5 THEN 1 ELSE NULL
       END
       ) as "Pronto"
       FROM ' . static::$table . ' WHERE ' . $conditions. ' GROUP BY Place')->fetchAll();
}   

public static function whereGroupByIndex() {
    $db = new DB();
    return $db->query('SELECT Place,
       COUNT(
       CASE WHEN Ocurrence_Status_Id = 1 THEN 1 ELSE NULL
       END) as "Aguardando",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 2 THEN 1 ELSE NULL
       END
       ) as "Rejeitado",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 3 THEN 1 ELSE NULL
       END
       ) as "Aceito",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 4 THEN 1 ELSE NULL
       END
       ) as "Andamento",
       COUNT(
       CASE WHEN 
       Ocurrence_Status_Id = 5 THEN 1 ELSE NULL
       END
       ) as "Pronto"
       FROM ' . static::$table . ' GROUP BY Place')->fetchAll();
}   


public static function orderByWithLimit($columns,$orientation, $limit) {
    $db = new DB();
    return $db->query('SELECT * FROM ' . static::$table . ' ORDER BY '.$columns . ' ' . $orientation .' LIMIT '.$limit)->fetchAll() ;
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

public static function delete_where($condition, $values) {
    $db = new DB();
    $db->query("DELETE FROM " . static::$table . " WHERE $condition", $values);
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
        return (object)array(
            'message' => $this->update($values, $db),
            'id' => false
        );
    } else {
        return (object)array(
            'message' => $this->insert($values, $db),
            'id' => $db->last_id
        );
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

public static function has_required_fields($data) {
    foreach (static::$requiredFields as $field) {
        if (!array_key_exists($field, $data)) return false;
        if ($data[$field] == 0) return false;
    }
    return true;
}
}