<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory,
  Notifiable;

  protected $fillable = [
    'name',
    'email',
    'password',
    'level',
    'exp',
    'money',
    'role',
    'farm',
    'phone',
    'ip',
    'bag',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'id' => 'string',
  ];

  public function refferal() {
    return $this->hasOne('App\Models\Refferal');
  }

  public function refbuy() {
    return $this->hasOne('App\Models\home\refBuy', 'ref_id');
  }

  public function info() {
    return $this->hasOne('App\Models\home\Info');
  }

  public function categories () {
    return $this->hasOne('App\Models\Categories', 'id_user');
  }

  public function deposit () {
    return $this->hasOne('App\Models\Deposit');
  }

  public function withdraw () {
    return $this->hasOne('App\Models\home\Withdraw');
  }

  public function partner () {
    return $this->hasOne('App\Models\home\Partner');
  }

  public function thcoin () {
    return $this->hasOne('App\Models\home\Thcoin');
  }

  public function buytoken () {
    return $this->hasOne('App\Models\home\Buytoken');
  }

  public function buytokenref () {
    return $this->hasOne('App\Models\home\Buytokenref');
  }
}