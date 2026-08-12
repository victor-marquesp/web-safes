<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->max(100);
            $table->string('description')->nullable()->max(255);
            $table->string('icon_path');
            $table->timestamps();
        });

    }

    public function down(): void {

        Schema::dropIfExists('currencies');
        
    }
};
