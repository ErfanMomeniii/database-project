<?php
class Submition extends DbModel implements ModelDao{

    public $submitionsId;
    public $devId;
    public $questionId;
    public $solved;
    public $score;
    public $dataAndTime;

    public function findById($id)
    {
        $query = "SELECT * FROM Submitions WHERE SubmitionsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Submitions WHERE SubmitionsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Submitions";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Submitions WHERE SubmitionsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Submitions VALUES (
                         ${model['devId']},${model['questionId']},
                         ${model['solved']},${model['score']},
                         ${model['dataAndTime']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}