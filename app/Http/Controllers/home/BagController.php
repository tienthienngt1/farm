<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use DB,Session;

class BagController extends Controller
{
  use GetAllRepositories;
  
    public function redirectBag()
    {
        return redirect('home/bag');
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
      if(isset($_POST['sell']))
      {
        $idVet =  json_decode($this->getIdVetBag($id));
        if($idVet === null){
          return $this->redirectBag();
        }
        $quantity = $idVet->quantity;
        $cost = $idVet->cost;
        $totalCost = ($quantity * $cost)/1000;
         
        if($idVet === null){
          return $this->redirectBag();
        }
        
        $dataMoney = [
          'money->balance' =>  $this->getMoneyUser()->balance + $totalCost,
        ];
        $updateMoney = $this->updateUser($dataMoney);
        
        $dataBag = [
         'bag->vet->'.$id => null,
        ];
        $updateBag = $this->updateUser($dataBag);
        
        if($updateMoney && $updateBag){
          Session::flash('notify',' Bán thành công, bạn nhận được '.$totalCost.'TH');
        }
        
        return $this->redirectBag();
      }
       
      return $this->redirectBag();
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
