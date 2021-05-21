<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Models\Like_comment;
use Session, Auth, DB;
use App\Http\Repositories\GetAllRepositories;

class CreateController extends Controller
{
  use GetAllRepositories;

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, $id) {
    if (!empty($id)) {

      // Compare time to prevent spam
      $getTimeDatabase = Categories::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->first();
      if ($getTimeDatabase !== null) {
        $compareTime = strtotime(now()) - strtotime($getTimeDatabase->created_at);
        if ($compareTime < 300) {
          Session::flash('notifyError', ' Đăng bài thất bại! Bài đăng phải cách nhau 5p ');
          return back();
        }
      }

      // Validate request
      $mess = [
        'tittle.required' => 'Tiêu đề không được để trống',
        'tittle.max' => 'Tiêu đề không được quá 100 kí tự',
        'content.required' => 'Nội dung không được để trống',
        'content.max' => 'Nội dung không được quá 500 kí tự',
      ];

      $request->validate([
        'tittle' => ['required', 'max:100'],
        'content' => ['required', 'max:500'],
      ], $mess);

      //Check role forum of user to allow post.
      if ($id == 2) {
        if (json_decode($this->getUser()->role)->roleForum === 1) {
          Session::flash('notifyError', ' Bạn chưa đủ điều kiện để đăng bài trong chủ đề này!');
          return back();
        }
        $this->updateUser([
          'role->roleForum' => 1
        ]);

      }

      // update post to database
      $data = [
        'id_user' => Auth::user()->id,
        'category' => $id,
        'hash' => md5(now()),
        'tittle' => $request->tittle,
        'content' => $request->content,
        'like' => 0,
        'view' => 0,
        'comment' => 0
      ];
      Categories::create($data);
      session::flash('notify', 'Tạo bài viết thành công !');
      return redirect('/forum/'.$id);
    }
    return redirect ($request->path());
  }


}