<?php

namespace ReesMcIvor\ClockIn\Models;

use Database\Factories\Orbit\CardFactory;
use Database\Factories\Orbit\ReaderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $table = 'nfc_readers';
    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return ReaderFactory::new();
    }
}
