<?php

use App\model\DbModel;
use App\repository\ModelDao;

class SocialMediaLinks_Company extends DbModel implements ModelDao{

    public $SocialMediaLinks_CompanyId;
    public $socialMediaLinksSMId;
    public $companyId;

    public function findById($id)
    {
        $query = "SELECT * FROM SocialMediaLinks_Company WHERE SocialMediaLinks_CompanyID = ${id}";
        $result = mssql_query($query);
        $ans = mssql_fetch_row($result);
        return $ans[0];
    }

    public function findByIds($ids)
    {
        $query = "SELECT * FROM SocialMediaLinks_Company WHERE SocialMediaLinks_CompanyID IN ${ids}";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function findAll()
    {
        $query = "SELECT * FROM SocialMediaLinks_Company";
        $result = mssql_query($query);
        $answer = [];
        while ($row = mssql_fetch_row($result)) {
            $answer[] = $row;
        }
        return $answer;
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM SocialMediaLinks_Company WHERE SocialMediaLinks_CompanyID = ${id}";
        $result = mssql_query($query);
        return $result;
    }

    public function save($model)
    {
        $query = "INSERT INTO SocialMediaLinks_Company VALUES (
                         ${model['socialMediaLinksSMId']},${model['companyId']},
                         )";
        $result = mssql_query($query);
        return $result;
    }
}