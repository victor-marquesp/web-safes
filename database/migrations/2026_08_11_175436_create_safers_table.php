<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {

        Schema::create('safers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->max(100);
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->integer('savings');
            $table->string('description')->nullable()->max(255);
            $table->timestamps();
        });
        
    }

    public function down(): void {

        Schema::dropIfExists('safers');

    }
};
