<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Bonus extends DbModel implements ModelDao{

    public $title;
    public $logoURL;

    public function findById($id)
    {
        $query = "SELECT * FROM Bonus WHERE BonusID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Bonus WHERE BonusID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Bonus";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Bonus WHERE BonusID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Bonus VALUES (
                         ${model['title']},${model['logoURL']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}