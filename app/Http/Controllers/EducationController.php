<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EducationAddRequest;

class EducationController extends Controller
{
    public function list()
    {
        return view('admin.education_list');
    }
    public function addShow()
    {
        return view('admin.education_add');
    }
    public function add(EducationAddRequest $request)
    {
        dd($request->all());
    }
}
