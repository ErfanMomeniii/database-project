<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Contest_InstitutionHost extends DbModel implements ModelDao{

    public $contest_InstitutionHostId;
    public $contestId;
    public $institutionId;

    public function findById($id)
    {
        $query = "SELECT * FROM Contest_InstitutionHost WHERE contest_InstitutionHostId = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Contest_InstitutionHost WHERE contest_InstitutionHostId IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Contest_InstitutionHost";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Contest_InstitutionHost WHERE contest_InstitutionHostId = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Contest_InstitutionHost VALUES (
                         ${model['contestId']},${model['institutionId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}
