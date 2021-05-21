<?php

namespace App\Http\Controllers\home\info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\home\info\InfoRepositories;
use App\Http\Repositories\GetUserRepositories;;
use Session;

class InforController extends Controller
{
    use InfoRepositories, GetUserRepositories;
  
    protected function redirect()
    {
      return redirect('home/info');
    }
    
    public function index()
    {
        if(!empty($_GET['edit'])){
          if($_GET['edit'] !== '1'){
            return $this->redirect();
          }
        }
        $info = $this->getUser();
        return view('home.info.index',['info' => $info]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validator($request->all())->validate();
      
      if($this->getInfoUser() !== null && $this->getInfoUser()->role === '1'){
        Session::flash('notifyError', ' Bạn đã nhập thông tin rồi. Không được sửa đổi.');
        return $this->redirect();
      }
      
      if($this->getInfoStk($request->stk)){
        Session::flash('notifyError', 'Số tài khoản đã sử dụng');
        return $this->redirect();
      }
      
      $data=[
        'bankname' => strtoupper($request->bankname),
        'stk' => $request->stk,
        'brand' => $request->brand,
        'user_id' => $this->getID(),
        'role' => 1,
      ];
      if($this->getInfoUser() !== null && $this->getInfoUser()->role === '0'){
        $this->updateInfo($data);
      }else{
        $this->insertInfo($data); 
      }
      Session::flash('notify', ' Cập nhật thông tin thành công');
      
      return $this->redirect();
    }


    protected function validator(array $data)
    {
      $mess = [
        'bankname.regex' => ' Tên ngân hàng phải viết hoa và không chứa kí tự đặc biệt',
        'stk.numeric' => ' STK phải là số',
        'brand.max' => ' Chi nhánh chỉ chứa nhiều nhất 35 kí tự',
        ];
        return Validator::make($data, [
            'bankname' => ['bail', 'required', 'regex:/^[A-Z\s]*$/'],
            'stk' => ['bail', 'required', 'numeric'],
            'brand' => ['bail', 'required', 'max:35'],
        ],$mess);
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
