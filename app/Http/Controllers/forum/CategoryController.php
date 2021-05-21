<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function show($id) {
    if (!empty($id)) {
      $data = DB::table('categories')->select('categories.created_at', 'categories.category', 'categories.hash', 'categories.tittle', 'users.name', 'categories.view', 'categories.like', 'categories.comment')->join('users', 'users.id', '=', 'categories.id_user')->where('categories.category', '=', $id)->orderByDesc('categories.created_at')->paginate(20);
      if ($id === "1") {
        return view('forum.hoidap', ['data' => $data]);
      };
      if ($id === "2") {
        return view('forum.thanhtoan', ['data' => $data]);
      };
      if ($id === "3") {
        return view('forum.trochuyen', ['data' => $data]);
      };
      if ($id === "4") {
        return view('forum.ketban', ['data' => $data]);
      };
    };
    return redirect ('/forum');

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
}