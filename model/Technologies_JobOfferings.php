<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Technologies_JobOfferings extends DbModel implements ModelDao{

    public $technologies_JobOfferingsId;
    public $technologieyId;
    public $jobOfferingId;

    public function findById($id)
    {
        $query = "SELECT * FROM Technologies_JobOfferings WHERE Technologies_JobOfferingsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Technologies_JobOfferings WHERE Technologies_JobOfferingsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Technologies_JobOfferings";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Technologies_JobOfferings WHERE Technologies_JobOfferingsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Technologies_JobOfferings VALUES (
                         ${model['technologieyId']},${model['jobOfferingId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}