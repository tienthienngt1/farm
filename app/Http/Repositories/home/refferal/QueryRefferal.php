<?php

namespace App\Http\Repositories\home\refferal;
use Illuminate\Http\Request;
use App\Models\Refferal;
use App\Models\home\refBuy;
use Auth;

trait QueryRefferal
{
  /**
   * Get Id User
   */
   protected function getID()
   {
     return Auth::user()->id;
   }

  /**
   * Query refferal code
   */
   protected function getRefferal(Request $request)
   {
     return Refferal::where('refferal', $request->ref)->first();
   }
   
   /**
    * Update ref_status to true
    * 
    */
    protected function updateRefUser($id, array $data)
    {
      return Refferal::where('user_id',$id)->update($data);
    }
    
    /**
     * Find Id user
     * 
     * 
     */
     protected function getIdUser()
    {
     return Refferal::where('user_id',$this->getID())->first();
    }
   
    /**
     * Find Id ref
     * @param id of ref
     * @return void
     */
     protected function getIdRef($id)
    {
     return Refferal::where('user_id',$id)->first();
    }
   
    /**
     * Update User into object of ref Usef
    */
    protected function updateRefStatus($data)
    {
      return Refferal::where('user_id',$this->getID())->update($data);
    }
    
    /**
     * Get decode ref_user
     */
     protected function getRefUser($id)
     {
       return json_decode(Refferal::where('user_id',$id)->first()->ref_user);
     }
     
     protected function getRefbuy()
     {
       return refBuy::where('ref_id', $this->getID())->orderBy('created_at', 'desc')->paginate(15);
     }
     
     protected function getRefbuyRegister()
     {
       return refBuy::where('ref_id', $this->getID())->where('name','1')->orderBy('created_at', 'desc')->paginate(15);
     }
     
     protected function updateRefbuy(array $data)
     {
       return refBuy::create($data);
     }
}