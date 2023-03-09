<?php

namespace App\Http\Controllers;
use App\Models\Check;
use App\Services\CheckService;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('dataExport');
    }

    /**
     * @param CheckService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CheckService $service)
    {
        $checks = $service->getChecks();

        foreach ($checks as $check){
            Check::create($check);
        }
        return response()->json(['message' => 'Успешно экспортировано'], 201);
    }

}
