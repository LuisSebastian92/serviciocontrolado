<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->foreignID('id_bullying')
            ->nullable()
            ->constrained('buyllings')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignID('id_selling')
            ->nullable()
            ->constrained('sellings')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignID('id_service')
            ->nullable()
            ->constrained('services')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
