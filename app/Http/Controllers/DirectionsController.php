<?php

namespace App\Http\Controllers;

use App\Direction;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Charts\Courrierchart;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        return view('directions.index', compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $chart      = \App\Courrier::all();
       $chart = new Courrierchart;
       $chart->labels(['', '', '']);
       $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
           'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
       ]);

        return view('directions.create',compact('user', 'chart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
                'direction'     => 'required|string|max:250',
                'sigle'         => 'required|string|max:10',
                'user'          => 'required|exists:users,id',
            ]
        );
        /* dd($request->input('user')); */
        $direction = new Direction([            
            'name'      =>      $request->input('direction'),
            'sigle'     =>      $request->input('sigle'),
            'chef_id'   =>      $request->input('user')

        ]);
        $direction->save();
        return redirect()->route('directions.index')->with('success','direction / service ajouté(e) avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direction = Direction::find($id);
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        return view('directions.update', compact('direction','id','chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'direction'     => 'required|string|max:250',
                'sigle'         => 'required|string|max:10',
            ]);
            $direction = Direction::find($id);
            $direction->name   =     $request->input('direction');
            $direction->sigle  =     $request->input('sigle');

            $direction->save();
        
            return redirect()->route('directions.index')->with('success','direction modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        $message = $direction->sigle.' a été supprimé(e)';
        return redirect()->route('directions.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $directions=Direction::with('chef.user','personnels.fonction')->get();
        return Datatables::of($directions)->make(true);

    }
}
