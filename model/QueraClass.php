<?php

use App\model\DbModel;
use App\repository\ModelDao;

class QueraClass extends DbModel implements ModelDao{

    public $classId;
    public $className;
    public $userPass;
    public $userRec;
    public $profName;
    public $academicYear;
    public $maxAttendeed;
    public $signInPossible;
    public $phoneNumber;
    public $classDetails;
    public $agreeToShareQs;
    public $archive;
    public $profileImageURL;
    public $term;
    public $institutionID;

    public function findById($id)
    {
        $query = "SELECT * FROM Class WHERE ClassID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Class WHERE ClassID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Class";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Class WHERE ClassID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Class VALUES (
                         ${model['className']},${model['userPass']},
                         ${model['userRec']},${model['profName']},
                         ${model['academicYear']},${model['maxAttendeed']},
                         ${model['signInPossible']},${model['phoneNumber']},
                         ${model['classDetails']},${model['agreeToShareQs']},
                         ${model['archive']},${model['profileImageURL']},
                         ${model['term']},${model['institutionID']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}
?>