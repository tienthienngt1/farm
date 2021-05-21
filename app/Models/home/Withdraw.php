<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'money',
    'hash',
    'status'
  ];

  public function user() {
    return $this->belongsTo('App\Models\User');
  }

  public function info() {
    return $this->belongsTo('App\Models\home\Info', 'user_id', 'user_id');
  }

}