<?php
namespace App\model;
use App\model\DbModel;
use App\repository\ModelDao;

class Assignment extends DbModel implements ModelDao{

    public $assignmentId;
    public $deadline;
    public $submitionDate;
    public $classId;
    public function findById($id)
    {
        $query = "SELECT * FROM Assignments WHERE AssignmentID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Assignments WHERE AssignmentID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Assignments";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Assignments WHERE AssignmentID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Assignments VALUES (
                         ${model['deadline']},${model['submitionDate']},${model['classId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}