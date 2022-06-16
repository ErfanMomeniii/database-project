<?php
class Question_Tags_Questions extends DbModel implements ModelDao{

    public $question_Tags_QuestionsId;
    public $questionTagsId;
    public $questionsId;
    public function findById($id)
    {
        $query = "SELECT * FROM Question_Tags_Questions WHERE Question_Tags_QuestionsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Question_Tags_Questions WHERE Question_Tags_QuestionsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Question_Tags_Questions";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Question_Tags_Questions WHERE Question_Tags_QuestionsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Question_Tags_Questions VALUES (
                         ${model['questionTagsId']},${model['questionsId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}