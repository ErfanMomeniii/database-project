<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Province extends DbModel implements ModelDao{

    public $provinceId;
    public $title;

    public function findById($id)
    {
        $query = "SELECT * FROM Province WHERE ProvinceID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Province WHERE ProvinceID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Province";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Province WHERE ProvinceID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Province VALUES (
                         ${model['title']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}