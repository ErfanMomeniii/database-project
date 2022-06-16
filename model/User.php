<?php

namespace App\model;

use App\model\DbModel;
use App\repository\ModelDao;

class User extends DbModel implements ModelDao
{
    public $userId;
    public $firstName;
    public $lastName;
    public $userName;
    public $email;
    public $emailStatus;
    public $password;
    public $phoneNumber;

    public function findById($id)
    {
        $query = "SELECT * FROM User WHERE UserID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM User WHERE UserID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM User";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM User WHERE UserID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO User VALUES (
                         ${model['firstName']},${model['lastName']},${model['userName']},
                         ${model['email']},${model['emailStatus']},${model['password']},
                         ${model['phoneNumber']})";
        $result = mssql_query($query);
        return $result;
    }
}