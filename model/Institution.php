<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Institution extends DbModel implements ModelDao{

    public $institutionId;
    public $name;
    public $kind;
    public $website;
    public $cityId;

    public function findById($id)
    {
        $query = "SELECT * FROM Institution WHERE InstitutionID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Institution WHERE InstitutionID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Institution";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Institution WHERE InstitutionID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Institution VALUES (
                         ${model['name']},${model['kind']},
                         ${model['website']},${model['cityId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}