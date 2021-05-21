<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thcoin extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'wallet',
    'money',
    'status',
  ];

  public function user() {
    return $this->belongsto('App\Models\User');
  }

  public function buytoken() {
    return $this->belongsto('App\Models\home\Buytoken', 'user_id', 'user_id');
  }

}