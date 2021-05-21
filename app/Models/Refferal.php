<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'ref_id',
    'refferal',
    'monney',
    'ref_status',
  ];

  public $timestamps = false;

  public function user() {
    return $this->belongsTo('App\Models\User');
  }
}