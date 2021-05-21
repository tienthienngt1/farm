<?php

namespace App\Http\Controllers\home\rank;

use App\Http\Controllers\Controller;
use App\Http\Repositories\GetUserRepositories;
use Illuminate\Http\Request;
use DB;
class RankController extends Controller
{
    use GetUserRepositories;
    public function index()
    {
        return redirect('home/rank/1');
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
      $arr = ['1','2','3'];
      if(!in_array($id, $arr)){
        return $this->index();
      }
      $level=null;
      $vet=null;
      $pet=null;
      if($id === '1'){
        $level = $this->getRank('level');
      }
      if($id === '2'){
        $vet = $this->getRank('levelFarm');
      }
      if($id === '3'){
        $pet = $this->getRank('levelPet');
      }
        return view('home.rank.index', ['id' => $id, 'level' => $level, 'vet' => $vet, 'pet' => $pet]);
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
