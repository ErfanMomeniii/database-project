<?php

use App\model\DbModel;
use App\repository\ModelDao;

class Company extends DbModel implements ModelDao
{

    public $companyId;
    public $website;
    public $briefIntro;
    public $size;
    public $about;
    public $persionName;
    public $showEngName;
    public $logoURL;
    public $acceptead;
    public $address;
    public $locationURL;
    public $yearFounded;
    public $fieldId;

    public function findById($id)
    {
        $query = "SELECT * FROM Company WHERE CompanyID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM Company WHERE CompanyID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Company";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM Company WHERE CompanyID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO Company VALUES (
                         ${model['website']},${model['briefIntro']},
                         ${model['size']},${model['about']},
                         ${model['persionName']},${model['showEngName']},
                         ${model['logoURL']},${model['acceptead']},
                         ${model['address']},${model['locationURL']},
                         ${model['yearFounded']},${model['fieldId']}, 
                            )";
        $result = mssql_query($query);
        return $result;
    }
}