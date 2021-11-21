<?php

namespace App\Services;

class BaseService
{
    public $model;

    public function initiate()
    {
        return new $this->model();
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function paginate($records = 15)
    {
        return $this->model::paginate($records);
    }

    public function search($field, $search)
    {
        return $this->model::where($field, 'LIKE', "%{$search}%");
    }

    public function getById($id)
    {
        return $this->model::findOrFail($id);
    }

    public function messageReturn($resource, $action)
    {
        $availableMessages = [
            'created' => 'The :resource was created!',
            'deleted' => 'The :resource was deleted!',
            'restored' => 'The :resource was restored!',
            'updated' => 'The :resource was updated!',
            'ran' => 'The action ran successfully!',
            'default' => 'Whoops! Something went wrong.'
        ];

        if (!in_array($action, $availableMessages)){
            $action = 'default';
        }

        return trans($availableMessages[$action], ['resource' => $resource]);
    }
}
