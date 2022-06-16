<?php
namespace App\model;
class  DbModel{
    public function __construct()
    {
        $host ="127.0.0.1:1433";
        $username ="sa";
        $password ="yourStrong(!)Password";
        $database ="master";
        mssql_connect($host, $username, $password);
        mssql_select_db($database);
    }
}
?>