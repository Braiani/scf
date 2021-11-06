<?php

namespace App\Services;

class BaseService
{
    public $model;

    public function getAll()
    {
        return $this->model::all();
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
