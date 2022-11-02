<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_id',
        'description',
        'position',
    ];
    public function activities(){
        return $this->hasMany(Activity::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function listt(){
        return $this->belongsTo(Listt::class);
    }
}
