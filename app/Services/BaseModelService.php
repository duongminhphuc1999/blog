<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModelService
{
    protected Model $model;

    public function create(array $adminData): Model
    {
        return $this->model->create($adminData);
    }

    public function update(Model $model, array $adminData): bool
    {
        return $model->update($adminData);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function findByField(string $field, $value, string $operation = '='): Collection
    {
        return $this->model->where($field, $operation, $value)->get();
    }

    public function findFirstByField(string $field, $value, string $operation = '=')
    {
        return $this->model->where($field, $operation, $value)->first();
    }

    public function findById(int $value)
    {
        return $this->model->where('id', $value)->first();
    }
}
