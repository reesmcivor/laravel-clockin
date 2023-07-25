<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nfc_card_reads', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\ReesMcIvor\ClockIn\Orbit\Card::class);
            $table->foreignIdFor(\ReesMcIvor\ClockIn\Orbit\Reader::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nfc_card_reads');
    }
};
