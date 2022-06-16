<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Question_Tags extends DbModel implements ModelDao{

    public $questionTagsId;
    public $title;

    public function findById($id)
    {
        $query = "SELECT * FROM Question_Tags WHERE QuestionTagsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Question_Tags WHERE QuestionTagsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Question_Tags";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Question_Tags WHERE QuestionTagsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Question_Tags VALUES (
                         ${model['title']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}