<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Licenses extends DbModel implements ModelDao{

    public $licenseId;
    public $title;
    public $score;
    public $details;
    public $authId;
    public $devId;

    public function findById($id)
    {
        $query = "SELECT * FROM Licenses WHERE LicenseID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Licenses WHERE LicenseID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Licenses";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Licenses WHERE LicenseID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Licenses VALUES (
                         ${model['title']},${model['score']},
                         ${model['details']},${model['authId']},
                         ${model['devId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}