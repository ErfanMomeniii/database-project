<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Question extends DbModel implements ModelDao{

    public $questionsId;
    public $title;
    public $timeLimit;
    public $memoryLimit;
    public $description;
    public $requiredLanguage;
    public $score;
    public $sharable;
    public $contestId;
    public $contestCategoryId;

    public function findById($id)
    {
        $query = "SELECT * FROM Questions WHERE QuestionsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Questions WHERE QuestionsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Questions";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Questions WHERE QuestionsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Questions VALUES (
                         ${model['title']},${model['timeLimit']},
                         ${model['memoryLimit']},${model['description']},
                         ${model['requiredLanguage']},${model['score']},
                         ${model['sharable']},${model['contestId']},
                         ${model['contestCategoryId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}