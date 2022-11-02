<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listt extends Model
{
    use HasFactory;
    protected $fillable = [
        'board_id',
        'title',
        'position',
    ];
    public function card(){
        return $this->hasMany(Card::class);
    }
    public function board(){
        return $this->belongsTo(Board::class);
    }
}
