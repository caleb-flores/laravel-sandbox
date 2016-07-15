<?php namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService implements ProductServiceInterface{
    
    protected  $validator;
    protected  $repository;
    
    public function __construct(ProductValidator $validator,ProductRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }


    public function addNewProduct($userId, array $productData)
    {
        if(!$this->userCanAddProduct($userId)){
            return array(
                'success' => false,
                'errors' => array('You cannot add a new product')
            );
        }

        $result = array();


        if($this->validator->with($productData)->passes()){
            $productData['user_id'] = $userId;
            $this->repository->create($productData);
            $result['success'] = true;
            return $result;
        }else{

            $result['success'] = false;
            $result['errors'] = $this->validator->errors();
            return $result;
        }
        
    }

    public function userCanAddProduct($userId)
    {
        //TODO: get the limit from config file
        return $this->repository->countByUser($userId) < 10;
    }
}