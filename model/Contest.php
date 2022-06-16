<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Contest extends DbModel implements ModelDao{

    public $contestId;
    public $featured;
    public $name;
    public $startingDateAndTime;
    public $duration;
    public $details;

    public function findById($id)
    {
        $query = "SELECT * FROM Contest WHERE ContestID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Contest WHERE ContestID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Contest";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Contest WHERE ContestID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Contest VALUES (
                         ${model['featured']},${model['name']},
                         ${model['startingDateAndTime']},${model['duration']},
                         ${model['details']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}