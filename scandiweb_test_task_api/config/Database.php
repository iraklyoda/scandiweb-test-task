<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database
{
    // Db Params
    private $host = 'localhost';
    private $db_name = 'scandiweb_products';
    private $username = 'root';
    private $password = '123';
    private $conn;

    // DB Params Production
//    private $cleardb_url;
//    private $host;
//    private $db_name;
//    private $username;
//    private $password;
//    private $conn;


    // DB Connect

    /**
     * @param  string  $host
     * @param  string  $db_name
     * @param  string  $username
     * @param  string  $password
     */

    /* For Production */
//    public function __construct(
//        array $cleardb_url,
//    ){
//        $this->cleardb_url = $cleardb_url;
//        $this->host        = $cleardb_url["host"];
//        $this->db_name     = substr($cleardb_url["path"], 1);
//        $this->username    = $cleardb_url["user"];
//        $this->password    = $cleardb_url["pass"];
//    }

    /**
     * @return mixed
     */
    public function getHost(): mixed
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->db_name;
    }

    /**
     * @return mixed
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @param  mixed  $host
     */

    public function connect()
    {
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->getHost() . ';dbname='
                . $this->getDbname(),
                $this->getUsername(), $this->getPassword()
            );
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}