<?php

namespace App\Http\Controllers;

use App\Services\EntryTypeService;
use Illuminate\Http\Request;

class EntryTypeController extends Controller
{
    public $entryTypeService;

    /**
     * @param EntryTypeService $entryTypeService
     */
    public function __construct(EntryTypeService $entryTypeService)
    {
        $this->entryTypeService = $entryTypeService;
    }

    public function index()
    {
        dd($this->entryTypeService->messageReturn('Tipo', 'run'));
    }
}
