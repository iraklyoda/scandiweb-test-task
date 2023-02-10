<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database
{

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
    ){
        $this->cleardb_url = $cleardb_url;
        $this->host        = $cleardb_url["host"];
        $this->db_name     = substr($cleardb_url["path"], 1);
        $this->username    = $cleardb_url["user"];
        $this->password    = $cleardb_url["pass"];
    }

    /**
     * @return mixed
     */
    public function get_host(): mixed
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function get_db_name(): string
    {
        return $this->db_name;
    }

    /**
     * @return mixed
     */
    public function get_username(): mixed
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function get_password(): mixed
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
                'mysql:host=' . $this->get_host() . ';dbname='
                . $this->get_db_name(),
                $this->get_username(), $this->get_password()
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