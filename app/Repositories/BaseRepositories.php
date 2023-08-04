<?php

namespace App\Repositories;

abstract class BaseRepositories implements RepositoriesInterface
{

    protected $model;
    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    abstract public function getModel();
    public function all()
    {
        return $this->model->all();
        // TODO: Implement all() method.
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
        // TODO: Implement find() method.
    }

    public function create(array $data)
    {
        return $this->model->create($data);
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        $object =$this->model->find($id);
        return $object->update($data);
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $object =$this->model->find($id);
        return $object->update();
        // TODO: Implement delete() method.
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}
