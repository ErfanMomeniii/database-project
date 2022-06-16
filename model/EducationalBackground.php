<?php

use App\model\DbModel;
use App\repository\ModelDao;

class EducationalBackground extends DbModel implements ModelDao{

    public $eDBakgrundId;
    public $eDStage;
    public $subject;
    public $since;
    public $currentlyStudying;
    public $avarageScore;
    public $logoURL;
    public $details;
    public $profileTitle;
    public $devId;
    public $institutionId;

    public function findById($id)
    {
        $query = "SELECT * FROM EducationalBackground WHERE EDBakgrundID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM EducationalBackground WHERE EDBakgrundID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM EducationalBackground";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM EducationalBackground WHERE EDBakgrundID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO EducationalBackground VALUES (
                         ${model['eDStage']},${model['subject']},
                         ${model['since']},${model['currentlyStudying']},
                         ${model['avarageScore']},${model['logoURL']},
                         ${model['details']},${model['profileTitle']},
                         ${model['devId']},${model['institutionId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}