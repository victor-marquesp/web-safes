<?php

use App\Enums\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {

        Schema::create('safes', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('state')->default(State::INTACT->value);

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('animal_id')->constrained()->restrictOnDelete();
            $table->foreignId('currency_id')->constrained()->restrictOnDelete();
            
            $table->string('description', 255)->nullable();

            $table->timestamps();
        });
        
    }

    public function down(): void {

        Schema::dropIfExists('safes');

    }
};
