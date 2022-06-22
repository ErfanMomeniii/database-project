<?php

use App\repository\ModelDao;

require ('../model/DbModel.php');
require ('../repository/ModelDao.php');
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

    public static function findByEmailAndPassword($email,$password){
        $query = "SELECT * FROM User WHERE Email IN ${email} AND UserPassword IN ${password}";
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
        $result = sqlsrv_query($this->conn,$query);
        return $result;
    }
}