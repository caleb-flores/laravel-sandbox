<?php namespace App\Services;

interface Validable {
    public function with(array $input);
    public function passes();
    public function errors();
}