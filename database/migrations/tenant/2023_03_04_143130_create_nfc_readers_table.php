<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nfc_readers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->macAddress()->unique();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->foreignIdFor( \ReesMcIvor\ClockIn\Company::class )->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nfc_readers');
    }
};
