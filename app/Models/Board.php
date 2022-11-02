<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'background',
        'background_type',
    ];
    public function user(){
       return $this->belongsToMany(User::class ,'members' , 'user_id', 'board_id');
       //return $this->belongsTo(User::class );
    }
    public function member(){
        return $this->hasMany(Member::class);
    }
    public function listt(){
        return $this->hasMany(Listt::class);
    }
    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
