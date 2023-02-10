<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Database {

    // DB Params
    private $cleardb_url;
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;



    // DB Connect

    /**
     * @param  string  $host
     * @param  string  $db_name
     * @param  string  $username
     * @param  string  $password
     */
    public function __construct(
        array $cleardb_url,
    ) {
        $this->cleardb_url = $cleardb_url;
        $this->host     = $cleardb_url["host"];
        $this->db_name  = substr($cleardb_url["path"],1);
        $this->username = $cleardb_url["user"];
        $this->password = $cleardb_url["pass"];
    }

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }   catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}