<?php

namespace App\Service;

class BaseService implements ServiceInterface
{
    public $repository;
    public function all()
    {
       return $this->repository->all();
    }

    public function find($id)
    {
        return $this->repository->find($id);
        // TODO: Implement find() method.
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data,$id);
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        return$this->repository->delete($id);
        // TODO: Implement delete() method.
    }
}
