<?php

use App\model\DbModel;
use App\repository\ModelDao;

class JobSubmition extends DbModel implements ModelDao{

    public $jobSubmitionId;
    public $jobOfferingsId;
    public $devId;

    public function findById($id)
    {
        $query = "SELECT * FROM JobSubmition WHERE JobSubmitionID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM JobSubmition WHERE JobSubmitionID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM JobSubmition";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM JobSubmition WHERE JobSubmition = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO JobSubmition VALUES (
                         ${model['jobOfferingsId']},${model['devId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}