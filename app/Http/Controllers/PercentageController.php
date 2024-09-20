<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Percentage;
use DB;


class PercentageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $percentages = Percentage::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();

      return view('percentage.percentage', compact('percentages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
          'sell_percentage'=>'required',

    ]);
      Percentage::create([
          'sell_percentage' => request('sell_percentage'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        return redirect('#');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Percentage $percentage)
    {
        return view('percentage.editPrecentage',compact('percentage',$percentage));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Percentage $percentage)
    {
        //Validate
        $request->validate([
          'sell_percentage'=>'required',
        ]);

        $percentage->sell_percentage = $request->sell_percentage;
        $percentage->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/percentage');
    }

}
