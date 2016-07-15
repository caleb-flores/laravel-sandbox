<?php namespace App\Services;

class ProductValidator extends AbstractLaravelValidate{
    protected $rules = array(
        'name' => 'required|min:10|max:50'
    );
}