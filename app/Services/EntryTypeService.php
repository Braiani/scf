<?php

namespace App\Services;

use App\Models\EntryType;

class EntryTypeService extends BaseService
{
    public function __construct()
    {
        $this->model = EntryType::class;
    }
}
