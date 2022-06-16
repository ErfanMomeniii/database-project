<?php

use App\model\DbModel;
use App\repository\ModelDao;

class PreferredTechnologies extends DbModel implements ModelDao{

    public $preferredTechnologiesId;
    public $technologyId;
    public $devId;

    public function findById($id)
    {
        $query = "SELECT * FROM PreferredTechnologies WHERE PreferredTechnologiesID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM PreferredTechnologies WHERE PreferredTechnologiesID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM PreferredTechnologies";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM PreferredTechnologies WHERE PreferredTechnologiesID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO PreferredTechnologies VALUES (
                         ${model['technologyId']},${model['devId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}