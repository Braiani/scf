<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Livewire\WithPagination;

class Category extends BaseComponent
{
    use WithPagination;
    public $title, $description, $active, $isEntry;

    public $isEdit = false;

    public $search;

    public function render(CategoryService $categoryService)
    {
        return view('livewire.category', [
            'categories' => $categoryService->search('description', $this->search)
        ]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->isEdit = false;
        $this->openModalPopover();
    }

    public function edit($id, CategoryService $categoryService)
    {
        $this->isEdit = true;
        $category = $categoryService->getById($id);
        $this->openModalPopover();
    }

    public function save()
    {

        $this->closeModalPopover();
    }
}
