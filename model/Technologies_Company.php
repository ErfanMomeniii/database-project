<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Technologies_Company extends DbModel implements ModelDao{

    public $technologies_CompanyId;
    public $technologyId;
    public $companyId;

    public function findById($id)
    {
        $query = "SELECT * FROM Technologies_Company WHERE Technologies_CompanyID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Technologies_Company WHERE Technologies_CompanyID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Technologies_Company";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Technologies_Company WHERE Technologies_CompanyID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Technologies_Company VALUES (
                         ${model['technologyId']},${model['companyId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}