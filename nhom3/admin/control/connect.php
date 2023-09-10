<?php
require "config.php";
class connect
{
    protected $link;
    function __construct()
    {
        $this->link = new mysqli(servername, username, password, database);
    }
    public function getlink()
    {
        return $this->link;
    }
    //protected $conn;
    // function __construct1()
    // {
    //     $this->conn =new mysqli(servername , username, password, database );
    // }
}
?>