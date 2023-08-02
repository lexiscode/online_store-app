<?php

namespace OnlineStoreApp\Models\Database;
use PDO;

/**
 * DbConnect
 * 
 * A connection to the database using Singleton pattern
 */

class DbConnect {
    private static $instance = null;
    private $conn;

    private function __construct() {
        // Private constructor to prevent direct instantiation
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'web_shop';

        // Create the database connection using PDO
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): DbConnect {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConn(): PDO {
        return $this->conn;
    }


    /**
     * Execute an SQL query on the database
     * 
     * @param string $sql The SQL query to execute
     * @return PDOStatement The result set as a PDOStatement object
     */
    
    public function query($sql)
    {
        $conn = $this->getConn();
        return $conn->query($sql);
    }

    /**
     * Prepare an SQL statement for execution
     * 
     * @param string $sql The SQL statement to prepare
     * @return PDOStatement The prepared statement as a PDOStatement object
     */
    
    public function prepare($sql)
    {
        $conn = $this->getConn();
        return $conn->prepare($sql);
    }

    /**
     * Prepare an SQL statement for execution
     * 
     * @param string $sql The SQL statement to prepare
     * @return PDOStatement The prepared statement as a PDOStatement object
     */
    
    public function lastInsertId()
    {
        $conn = $this->getConn();
        return $conn->lastInsertId();
    }
}
