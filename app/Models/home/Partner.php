<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'wallet',
    'vip',
    'token',
  ];

  public $timestamps = true;

  public function user() {
    return $this->belongsto('App\Models\User');
  }

  public function info() {
    return $this->hasOne('App\Models\home\Info');
  }
}