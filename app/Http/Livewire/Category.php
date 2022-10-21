<?php

namespace App\Http\Livewire;

use App\Services\CategoryService;
use Livewire\WithPagination;

class Category extends BaseComponent
{
    use WithPagination;

    public $category;
    public $isEdit = false;
    public $isConfirmationOpen = false;

    public $search;

    protected $rules = [
        'category.title' => 'required|string',
        'category.description' => 'required|string',
        'category.active' => 'nullable|boolean',
        'category.entry' => 'required|in:expense,revenue',
    ];

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
        $this->category = $categoryService->getById($id);
        $this->openModalPopover();
    }

    public function save(CategoryService $categoryService)
    {
        if ($this->isEdit){
            $this->validate();
            $this->category->save();
        }else{
            $this->validate();
            $categoryService->create($this->category);
        }
        $this->resetCreateForm();
        $this->sendToastMessage('success', 'Categoria salva com sucesso!');
        $this->closeModalPopover();
    }

    public function delete($id, CategoryService $categoryService)
    {
        $this->isConfirmationOpen = true;
    }
}
