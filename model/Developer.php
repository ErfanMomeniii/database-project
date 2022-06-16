<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Developer extends DbModel implements ModelDao{

    public $devId;
    public $employmentstatus;
    public $employmentKind;
    public $expectedSalary;
    public $militaryServiceStatus;
    public $age;
    public $SSN;
    public $dateOfBirth;
    public $aboutMe;
    public $profilePicURL;
    public $rate;
    public $userId;
    public $institutionId;
    public $cityId;

    public function findById($id)
    {
        $query = "SELECT * FROM Developer WHERE DevID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Developer WHERE DevID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Developer";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Developer WHERE DevID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Developer VALUES (
                         ${model['employmentstatus']},${model['employmentKind']},
                         ${model['expectedSalary']},${model['militaryServiceStatus']},
                         ${model['age']},${model['SSN']},
                         ${model['dateOfBirth']},${model['aboutMe']},
                         ${model['profilePicURL']},${model['rate']},
                         ${model['userId']},${model['institutionId']},
                         ${model['cityId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}