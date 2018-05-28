<?php
class DB
{
    public $host = HOSTNAME,
        $db_name = DB_NAME,
        $password = '',
        $user = 'root',
        $charset = 'utf8',
        $pdo = null,
        $error = null,
        $debug = false,
        $last_id = null;

    function __construct($host = null, $db_name = null, $password = null,$user = null, $charset = null, $debug = null) {
        $this->host = defined('HOSTNAME') ? HOSTNAME : $this->host;
        $this->db_name = defined('DB_NAME') ? DB_NAME : $this->db_name;
        $this->password = defined('DB_PASSWORD') ? DB_PASSWORD : $this->password;
        $this->user = defined('DB_USER') ? DB_USER : $this->user;
        $this->charset = defined('DB_CHARSET') ? DB_CHARSET : $this->charset;
        $this->debug = defined('DEBUG') ? DEBUG : $this->debug;
        $this->connect();
    }
    
    final protected function connect() {
        $pdo_details  = "mysql:host={$this->host};";
        $pdo_details .= "dbname={$this->db_name};";
        $pdo_details .= "charset={$this->charset};";
        try {
            $this->pdo = new PDO($pdo_details, $this->user, $this->password);
            if ($this->debug === true) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
            unset($this->host);
            unset($this->db_name);
            unset($this->password);
            unset($this->user);
            unset($this->charset);
        }
        catch (PDOException $e) {
            if ($this->debug === true) {
                echo "Erro: " . $e->getMessage();
            }
            die();
        }
    }
    public function query( $stmt, $data_array = null) {
        $query = $this->pdo->prepare($stmt);
        $check_exec = $query->execute($data_array);
        if ($check_exec) {
            return $query; 
        }
        $error = $query->errorInfo();
        $this->error = $error[2];
        return false;
    }
    
    public function insert( $table) {
        $cols = array();
        $place_holders = '(';
        $values = array();
        $j = 1;
        $data = func_get_args();
        if (!isset( $data[1]) || !is_array($data[1])) {
            return;
        }
        for ( $i = 1; $i < count( $data); $i++) {
            foreach ($data[$i] as $col => $val) {
                if ( $i === 1) {
                    $cols[] = "`$col`";
                }
                if ( $j != $i) {
                    $place_holders .= '), (';
                }
                $place_holders .= '?, ';
                $values[] = $val;
                $j = $i;
            }
            $place_holders = substr($place_holders, 0, strlen($place_holders) - 2);
        }
        $cols = implode(', ', $cols);
        $stmt = "INSERT INTO `$table` ($cols) VALUES $place_holders) ";
        try {
            $insert = $this->query($stmt, $values);
        }
        catch (Exception $ex) {
            echo $ex;
        }
        if ($insert) {
            if (method_exists($this->pdo, 'lastInsertId') && $this->pdo->lastInsertId()) {
                $this->last_id = $this->pdo->lastInsertId();
            }
            return $insert;
        }
        return;
    }
    public function update($table, $where_field, $where_field_value, $values) {
        if (empty($table) || empty($where_field) || empty($where_field_value) ) {
            return;
        }
        $stmt = " UPDATE `$table` SET ";
        $set = array();
        $where = " WHERE `$where_field` = ? ";
        if (! is_array( $values)) {
            return;
        }
        foreach ( $values as $column => $value) {
            $set[] = " `$column` = ?";
        }
        $set = implode(', ', $set);
        $stmt .= $set . $where;
        $values[] = $where_field_value;
        $values = array_values($values);
        $update = $this->query( $stmt, $values);
        if ( $update) {
            return $update;
        }
        return;
    }
    
    public function delete( $table, $where_field, $where_field_value) {
        if (empty($table) || empty($where_field) || empty($where_field_value) ) {
            return;
        }
        $stmt = "DELETE FROM `$table` ";
        $where = " WHERE `$where_field` = ? ";
        $stmt .= $where;
        $values = array($where_field_value);
        $delete = $this->query($stmt, $values);
        if ($delete) {
            return $delete;
        }
        return;
    }
} ?>
