<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Auth;

class TopicController extends Controller
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
  public function show(Request $request, $id, $topic) {
    $check_topic = DB::table('categories')->where('hash', $topic)->count();
    if ($check_topic === 0) {
      return redirect ('/forum/'.$id);
    }

    $get_data = DB::table('categories')->select('categories.id', 'categories.view', 'users.name', 'users.level', 'users.email', 'categories.content', 'categories.created_at', 'categories.like', 'categories.comment', 'categories.tittle')->join('users', 'users.id', '=', 'categories.id_user')->where('categories.hash', '=', $topic)->first();
    $id = $get_data->id;
    $comment = DB::table('comments')->select('users.name', 'users.email', 'users.level', 'comments.id', 'comments.id_category', 'comments.content', 'comments.created_at')->join('users', 'users.id', '=', 'comments.id_user')->where('id_category', $id)->orderByDesc('comments.created_at')->get();
    $check_like = DB::table('likes')->where('id_user', Auth::user()->id)->where('id_category', $id)->first();
    return view('forum.topic', ['data' => $get_data, 'comment' => $comment, 'check_like' => $check_like]);
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