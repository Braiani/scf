<?php

namespace App\Http\Livewire;

use App\Services\EntryTypeService;
use Livewire\Component;

class EntryType extends Component
{
    protected $entryTypeService;
    public $entryTypes, $title, $description, $active;
    public $isModalOpen = 0;


    public function mount(EntryTypeService $entryTypeService)
    {
        $this->entryTypeService = $entryTypeService;
    }

    public function render()
    {
        $this->entryTypes = \App\Models\EntryType::all();
        return view('livewire.entry-type');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->isModalOpen = true;
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function resetCreateForm()
    {
        $this->reset(['title', 'description', 'active']);
        $this->active = true;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => 'sometimes|nullable'
        ]);
        \App\Models\EntryType::create([
            'title' => $this->title,
            'description' => $this->description,
            'active' => $this->active ?? false
        ]);

        session()->flash('message', 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit(\App\Models\EntryType $entryType)
    {
        $this->title = $entryType->title;
        $this->description = $entryType->description;
        $this->active = $entryType->active;

        $this->openModalPopover();
    }

    public function delete(\App\Models\EntryType $entryType)
    {
        $entryType->delete();
        session()->flash('message', 'Studen deleted.');
    }
}
