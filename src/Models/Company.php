<?php

namespace ReesMcIvor\ClockIn\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\Orbit\CardFactory;

class Company extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CompanyFac::new();
    }
}
