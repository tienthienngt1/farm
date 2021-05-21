<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'bankname',
        'stk',
        'brand',
        'role',
    ];
    
    public function user()
    {
      return $this->belongsto('App\Models\User');
    }
    
    public function refferal()
    {
      return $this->hasOne('App\Models\Refferal','user_id','user_id');
    }
    
    public function withdraw() 
    {
      return $this->hasOne('App\Models\home\Withdraw', 'user_id', 'user_id');
    }
}
