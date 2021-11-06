<?php

namespace App\Services;

class BaseService
{

    public function messageReturn($resource, $action)
    {
        $availableMessages = [
            'created' => 'The :resource was created!',
            'deleted' => 'The :resource was deleted!',
            'restored' => 'The :resource was restored!',
            'updated' => 'The :resource was updated!',
            'ran' => 'The action ran successfully!',
        ];

        return trans($availableMessages[$action], ['resource' => $resource]);
    }
}
