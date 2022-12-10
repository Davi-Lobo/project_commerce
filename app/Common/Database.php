<?php

namespace App\Common;

use \PDO;
use \PDOException;

class Database {

    /**
     * Database host
     * 
     * @var string
     */
    private static $host;

    /**
     * Database name
     * 
     * @var string
     */
    private static $name;

    /**
     * Database user
     * 
     * @var string
     */
    private static $user;

    /**
     * Database password
     * 
     * @var string
     */
    private static $pass;

    /**
     * Database connection port
     * 
     * @var string
     */
    private static $port;

    /**
     * Table name
     * 
     * @var string
     */
    private $table;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param string $host
     * @param string $name
     * @param string $user
     * @param string $pass
     * @param integer $port
     */
    public static function config($host,$name,$user,$pass,$port = 3306){
        self::$host = $host;
        self::$name = $name;
        self::$user = $user;
        self::$pass = $pass;
        self::$port = $port;
    }

    /**
     * @param string $table
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::$host.';dbname='.self::$name.';port='.self::$port,self::$user,self::$pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         
        } catch(PDOException $e) {
            die('ERROR: '. $e->getMessage());
        }
    }

    /**
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params=[]) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch(PDOException $e) {
            die('ERROR: '. $e->getMessage());
        }
    }

    /**
     * @param array $values
     * @return integer
     */
    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('. implode(',', $fields) .') VALUES ('.implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        $where = strlen($where) ? 'WHERE ' .$where : '';
        $order = strlen($order) ? 'ORDER BY ' .$order : '';
        $limit = strlen($limit) ? 'LIMIT ' .$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    /**
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where, $values) {
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE ' .$where;

        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * @param string $where
     * @return boolean
     */
    public function delete($where) {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }
}