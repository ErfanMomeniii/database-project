<?php

use App\model\DbModel;
use App\repository\ModelDao;

class City extends DbModel implements ModelDao{

    public $cityId;
    public $title;
    public $provinceId;

    public function findById($id)
    {
        $query = "SELECT * FROM City WHERE CityID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM City WHERE CityID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM City";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM City WHERE CityID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO City VALUES (
                         ${model['title']},${model['provinceId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }

}