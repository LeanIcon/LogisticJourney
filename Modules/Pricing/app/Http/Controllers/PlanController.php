<?php

declare(strict_types=1);

namespace Modules\Pricing\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

final class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pricing::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pricing::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('pricing::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pricing::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
