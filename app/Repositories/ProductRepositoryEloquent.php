<?php namespace App\Repositories;

use App\Entities\Products;
class ProductRepositoryEloquent extends Repository implements ProductRepository{


    public function getByUser($userId)
    {
        return $this->findBy('user_id',$userId);
    }
    

    function model()
    {
        return Products::class;
    }

    public function countByUser($userId)
    {
        return $this->getByUser($userId)->count();
    }

    
}