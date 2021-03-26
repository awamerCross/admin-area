<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\IModelRepository;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModelRepository implements IModelRepository
{
    public $model;

    /**
     * AbstractModelRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->latest()->get();
    }

    public function store($attributes = [])
    {
        if (!empty($attributes))
            return $this->model->create($attributes);
        else
            return false;
    }


    public function find($id)
    {
        return $this->model->find($id);
    }


    public function update(Model $model, $attributes = [])
    {
        if (!empty($attributes)) {
            $model->update($attributes);
            return $model;
        }
        return $model;
    }

    public function softDelete(Model $model)
    {
        return $model->delete();
    }


    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
}
