<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd =DB::table('categories')->where('category','1')->count();
        $th =DB::table('categories')->where('category','2')->count();
        $tc =DB::table('categories')->where('category','3')->count();
        $kb =DB::table('categories')->where('category','4')->count();
        $data=[
          'hd' => $hd,  
          'th' => $th,  
          'kb' => $kb,  
          'tc' => $tc,  
        ];
        return view('index.forum',['data' => $data]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
