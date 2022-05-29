<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portfolio_list');
    }
    public function create()
    {
        return view('admin.portfolio_add');
    }
    public function store(PortfolioRequest $request)
    {
        dd($request->all());
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
