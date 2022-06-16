<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Contest_CompanyHost extends DbModel implements ModelDao{

    public $contest_CompanyHostId;
    public $contestId;
    public $companyId;

    public function findById($id)
    {
        $query = "SELECT * FROM Contest_CompanyHost WHERE contest_CompanyHostID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Contest_CompanyHost WHERE contest_CompanyHostID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Contest_CompanyHost";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Contest_CompanyHost WHERE contest_CompanyHostID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Contest_CompanyHost VALUES (
                         ${model['contestId']},${model['companyId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}