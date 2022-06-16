<?php
namespace App\repository;
interface ModelDao{
    public function findById($id);
    public function findByIds($ids);
    public function findAll();
    public function deleteById($id);
    public function save($model);
}