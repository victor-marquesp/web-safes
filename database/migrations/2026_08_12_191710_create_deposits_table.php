<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 
    function up(): void {

        Schema::create('deposits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('safe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('coin_id')->nullable()->constrained()->nullOnDelete();

            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedBigInteger('value_cents');
            
            $table->timestamps();
        });

    }

    public function down(): void {

        Schema::dropIfExists('deposits');

    }
};
