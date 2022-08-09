<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLang(Request $request): RedirectResponse
    {
        try {
            $locale = $request->code ?? 'jp';
            if (!in_array($locale, ['jp', 'en'])) {
                abort(400);
            }
            session()->put('locale', $locale);

            return redirect()->route('admin.dashboard');
        } catch (ValidatorException $e) {
            return redirect()->route('admin.dashboard');
        }//end try
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function setLimitPage(Request $request): \Illuminate\Http\JsonResponse
    {
        $sessionName = $request->name;
        $sessionValue = $request->value;

        if (empty($sessionName) || empty($sessionValue)) {
            return response()->json([], 201);
        }
        session([
            $sessionName => $sessionValue
        ]);

        return response()->json();
    }
}
