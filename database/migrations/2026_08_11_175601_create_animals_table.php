<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {

        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->max(50);
            $table->string('description')->nullable()->max(255);
            $table->string('icon_path')->max(255);
            $table->timestamps();
        });

    }

    public function down(): void {

        Schema::dropIfExists('animals');

    }

};
