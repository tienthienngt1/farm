<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refbuy extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'ref_id',
        'name',
        'money',
    ];
    
    public function user()
    {
      return $this->belongsto('App\Models\User');
    }
}
