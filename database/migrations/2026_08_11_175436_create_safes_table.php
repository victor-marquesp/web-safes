<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {

        Schema::create('safes', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->foreignId('animal_id')->constrained()->restrictOnDelete();
            $table->foreignId('currency_id')->constrained()->restrictOnDelete();
            
            $table->string('description')->nullable()->max(255);

            $table->timestamps();
        });
        
    }

    public function down(): void {

        Schema::dropIfExists('safes');

    }
};
