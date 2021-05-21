<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buytoken extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'hash',
    'user_ref',
    'money',
  ];

  public function user() {
    return $this->belongsto('App\Models\User');
  }

  public function thcoin() {
    return $this->hasOne('App\Models\home\Thcoin', 'user_id', 'user_id');
  }

}