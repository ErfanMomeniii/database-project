<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Technologies_WorkExperience extends DbModel implements ModelDao{

    public $technologies_WorkExperienceId;
    public $technologyId;
    public $workExpId;

    public function findById($id)
    {
        $query = "SELECT * FROM Technologies_WorkExperience WHERE Technologies_WorkExperienceID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Technologies_WorkExperience WHERE Technologies_WorkExperienceID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Technologies_WorkExperience";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Technologies_WorkExperience WHERE Technologies_WorkExperienceID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Technologies_WorkExperience VALUES (
                         ${model['technologyId']},${model['workExpId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}