<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Developer_Class extends DbModel implements ModelDao{

    public $devClassId;
    public $devId;
    public $classId;
    public $studentId;

    public function findById($id)
    {
        $query = "SELECT * FROM Developer_Class WHERE DevClassID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Developer_Class WHERE DevClassID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Developer_Class";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Developer_Class WHERE DevClassID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Developer_Class VALUES (
                         ${model['devId']},${model['classId']},
                         ${model['studentId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}