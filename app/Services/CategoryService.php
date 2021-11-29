<?php

namespace App\Services;

use App\Models\Category;

class CategoryService extends BaseService
{

    public function __construct()
    {
        $this->model = Category::class;
    }

    public function search($field, $search)
    {
        return parent::search($field, $search)->paginate();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

}
