<?php namespace App\Repositories;


interface ProductRepository extends RepositoryInterface{

    public function getByUser($userId);

    public function countByUser($userId);
}