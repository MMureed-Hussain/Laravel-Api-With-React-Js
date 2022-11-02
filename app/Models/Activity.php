<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'board_id',
        'card_id',
        'type',
        'message',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function board(){
        return $this->belongsTo(Board::class);
    }
    public function card(){
        return $this->belongsTo(Card::class);
    }
}
