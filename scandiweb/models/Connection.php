<?php

/**
 * Class Connection
 */
class Connection
{
    /**
     * @var string
     */
    private $host = "localhost";
    /**
     * @var string
     */
    private $dbname = "scandiweb";
    /**
     * @var string
     */
    private $user = "root";
    /**
     * @var string
     */
    private $pass = "";
    /**
     * @var null|PDO  
     */
    private $conn = null;

    /**
     * Connection constructor.
     * Creates connection with database.
     */
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->user, $this->pass);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function conn()
    {
        return $this->conn;
    }
}
