<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
