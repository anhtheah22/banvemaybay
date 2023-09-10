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
}
?>
