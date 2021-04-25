<?php

namespace App\Http\Controllers;

use App\Daf;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

class DafsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function show(Daf $daf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function edit(Daf $daf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daf $daf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daf $daf)
    {
        //
    }
    
    public function list(Request $request)
    {
        $dafs=Daf::with('courrier')->get();
        return Datatables::of($dafs)->make(true);
        
    }
}
