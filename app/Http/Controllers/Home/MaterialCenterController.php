<?php

namespace App\Http\Controllers\Home;

use App\Models\MaterialCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('home.material_center.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('home.material_center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialCenter  $materialCenter
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialCenter $materialCenter)
    {

    }
     //用户资料修改
    public function edit(MaterialCenter $materialCenter)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialCenter  $materialCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialCenter $materialCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialCenter  $materialCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialCenter $materialCenter)
    {
        //
    }
}
