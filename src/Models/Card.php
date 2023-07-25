<?php

namespace ReesMcIvor\ClockIn\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CardFactory;

class Card extends Model
{
    use HasFactory;

    protected $table = 'nfc_cards';
    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return CardFactory::new();
    }

    public function reads()
    {
        return $this->hasMany(CardRead::class, 'card_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
