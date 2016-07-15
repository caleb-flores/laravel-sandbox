<?php namespace App\Repositories;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
abstract class  Repository implements RepositoryInterface{

    protected  $model;

    private $app;

    abstract function model();

    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new Exception();

        return $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->destroy($id);
    }

    public function find($id, $columns = array('*'))
    {
        // TODO: Implement find() method.
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field,$value);
    }


}