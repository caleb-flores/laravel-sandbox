<?php namespace App\Services;
use Illuminate\Validation\Factory as Validator;

class AbstractLaravelValidate implements Validable{

    protected $validator;

    protected $rules = array();

    protected $messages = array();

    protected $data = array();

    protected $errors = array();

    /**
     * AbstractLaravelValidate constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function with(array $input)
    {
        $this->data = $input;
        return $this;
    }

    public function passes()
    {
        $validator = $this->validator->make(
            $this->data,
            $this->rules,
            $this->messages
        );

        if($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}