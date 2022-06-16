<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Technology extends DbModel implements ModelDao{

    public $technologiesId;
    public $title;

    public function findById($id)
    {
        $query = "SELECT * FROM Technologies WHERE TechnologiesID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Technologies WHERE TechnologiesID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Technologies";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Technologies WHERE TechnologiesID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Technologies VALUES (
                         ${model['title']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}