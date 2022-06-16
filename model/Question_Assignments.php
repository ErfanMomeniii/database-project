<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Question_Assignments extends DbModel implements ModelDao{

    public $question_AssignmentsId;
    public $questionId;
    public $assignmentId;

    public function findById($id)
    {
        $query = "SELECT * FROM Question_Assignments WHERE Question_AssignmentsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Question_Assignments WHERE Question_AssignmentsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Question_Assignments";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Question_Assignments WHERE Question_AssignmentsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Question_Assignments VALUES (
                         ${model['questionId']},${model['assignmentId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}