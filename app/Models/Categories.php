<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  use HasFactory;

  protected $fillable = [
    'id_user',
    'category',
    'tittle',
    'content',
    'hash',
    'view',
    'like',
    'comment',
  ];

  public function user() {
    return $this->belongsTo('App\Models\User', 'id_user');
  }

  public function comment() {
    return $this->hasOne('App\Models\Comment', 'id_category');
  }
}