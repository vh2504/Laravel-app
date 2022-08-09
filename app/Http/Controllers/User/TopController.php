<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TopController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('pages.top');
    }
}
