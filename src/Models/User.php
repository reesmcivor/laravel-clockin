<?php

namespace ReesMcIvor\ClockIn\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'nfc_users';
    protected $guarded = ['id'];
    protected $casts = [
        'clocked_in' => 'boolean',
    ];

    public function cards()
    {
        return $this->hasMany(\ReesMcIvor\ClockIn\Orbit\Card::class);
    }

    public function toggleClockedIn()
    {
        $this->clocked_in = !$this->clocked_in;
        return $this;
    }

}
