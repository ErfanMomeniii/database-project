<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Field extends DbModel implements ModelDao{

    public $fieldId;
    public $title;

    public function findById($id)
    {
        $query = "SELECT * FROM Field WHERE FieldID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Field WHERE FieldID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Field";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Field WHERE FieldID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Field VALUES (
                         ${model['title']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}