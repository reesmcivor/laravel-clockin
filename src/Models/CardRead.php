<?php

namespace ReesMcIvor\ClockIn\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CardFactory;
use Database\Factories\CardReadFactory;

class CardRead extends Model
{
    use HasFactory;

    protected $table = 'nfc_card_reads';
    protected $guarded = ["id"];

    protected static function newFactory()
    {
        return CardReadFactory::new();
    }
}
