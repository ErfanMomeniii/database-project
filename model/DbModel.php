<?php

class  DbModel
{
    public $conn;
    public function __construct()
    {
        $username = "sa";
        $password = "yourStrong(!)Password";
        $database = "master";
        $serverName = "127.0.0.1:1433"; //serverName\instanceName
        $connectionInfo = array( "Database"=>$database, "UID"=>$username, "PWD"=>$password);
        $this->conn = sqlsrv_connect( $serverName, $connectionInfo);
    }
}

?>