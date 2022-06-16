<?php

use App\model\DbModel;
use App\repository\ModelDao;

class WorkExperience extends DbModel implements ModelDao{

    public $workExpId;
    public $jobTitle;
    public $workingSince;
    public $workingTill;
    public $details;
    public $profileTitle;
    public $companyId;
    public $devId;

    public function findById($id)
    {
        $query = "SELECT * FROM WorkExperience WHERE WorkExpID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM WorkExperience WHERE WorkExpID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM WorkExperience";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM WorkExperience WHERE WorkExpID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO WorkExperience VALUES (
                         ${model['jobTitle']},${model['workingSince']},
                         ${model['workingTill']},${model['details']},
                         ${model['profileTitle']},${model['companyId']},
                         ${model['devId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}