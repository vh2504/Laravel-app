<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\OfficeService;
use App\Services\Admin\OfficeTypeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * @var \App\Services\Admin\OfficeService
     */
    protected OfficeService $officeService;

    /**
     * @var \App\Services\Admin\OfficeTypeService
     */
    protected OfficeTypeService $officeTypeService;

    /**
     * @param \App\Services\Admin\OfficeService     $officeService
     * @param \App\Services\Admin\OfficeTypeService $officeTypeService
     */
    public function __construct(OfficeService $officeService, OfficeTypeService $officeTypeService)
    {
        $this->officeService  = $officeService;
        $this->officeTypeService  = $officeTypeService;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $data = $this->officeService->index();
        
        return view('office.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $data = $this->officeService->create();

        return view('office.create', $data);
    }
}
