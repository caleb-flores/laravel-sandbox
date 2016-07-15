<?php namespace App\Services;

interface ProductServiceInterface{

    public function addNewProduct($userId,array $productData);
}