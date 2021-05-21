<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buytokenref extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'hash',
    'money',
  ];

  public function user() {
    return $this->belongsto('App\Models\User');
  }

}