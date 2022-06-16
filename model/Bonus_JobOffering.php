<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Bonus_JobOffering extends DbModel implements ModelDao{

    public $bonus_JobOfferingId;
    public $JobOfferingsId;
    public $bonusId;

    public function findById($id)
    {
        $query = "SELECT * FROM Bonus_JobOfferings WHERE Bonus_JobOfferingsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Bonus_JobOfferings WHERE Bonus_JobOfferingsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Bonus_JobOfferings";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Bonus_JobOfferings WHERE Bonus_JobOfferingsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Bonus_JobOfferings VALUES (
                         ${model['JobOfferingsId']},${model['bonusId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}