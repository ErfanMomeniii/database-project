<?php

use App\model\DbModel;
use App\repository\ModelDao;

class SocialMediaLink extends DbModel implements ModelDao{

    public $SMID;
    public $URL;
    public $logoURL;
    public function findById($id)
    {
        $query = "SELECT * FROM SocialMediaLinks WHERE SMID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM SocialMediaLinks WHERE SMID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM SocialMediaLinks";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM SocialMediaLinks WHERE SMID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO SocialMediaLinks VALUES (
                         ${model['URL']},${model['logoURL']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}