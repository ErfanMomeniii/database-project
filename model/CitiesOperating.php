<?php

use App\model\DbModel;
use App\repository\ModelDao;

class CitiesOperating extends DbModel implements ModelDao{

    public $citiesOperatingId;
    public $cityId;
    public $companyId;

    public function findById($id)
    {
        $query = "SELECT * FROM CitiesOperating WHERE CitiesOperatingID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM CitiesOperating WHERE CitiesOperatingID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM CitiesOperating";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM CitiesOperating WHERE CitiesOperatingID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO CitiesOperating VALUES (
                         ${model['cityId']},${model['companyId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}