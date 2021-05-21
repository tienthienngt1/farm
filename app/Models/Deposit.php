<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'bank',
    'money',
    'hash',
    'status',
  ];
  protected function user() {
    return $this->belongsTo('App\Models\User');
  }
}