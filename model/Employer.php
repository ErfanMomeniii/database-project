<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Employer extends DbModel implements ModelDao{

    public $eId;
    public $userId;
    public $companyId;

    public function findById($id)
    {
        $query = "SELECT * FROM Employer WHERE EID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Employer WHERE EID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Employer";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Employer WHERE EID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Employer VALUES (
                         ${model['userId']},${model['companyId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}