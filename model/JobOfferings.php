<?php
class JobOfferings extends DbModel implements ModelDao{

    public $jobOfferingsId;
    public $title;
    public $kind;
    public $remote;
    public $intro;
    public $requirements;
    public $postedDataAndTime;
    public $deadline;
    public $salary;
    public $expLevel;
    public $companyId;
    public $cityId;

    public function findById($id)
    {
        $query = "SELECT * FROM JobOfferings WHERE JobOfferingsID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM JobOfferings WHERE JobOfferingsID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM JobOfferings";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM JobOfferings WHERE JobOfferingsID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO JobOfferings VALUES (
                         ${model['title']},${model['kind']},
                         ${model['remote']},${model['intro']},
                         ${model['requirements']},${model['postedDataAndTime']},
                         ${model['deadline']},${model['salary']},
                         ${model['expLevel']},${model['companyId']},
                         ${model['cityId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}