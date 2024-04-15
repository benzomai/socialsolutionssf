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
        Schema::create('smm', function (Blueprint $table) {
            $table->id('socmed_id');
            $table->integer('socmed_user_id');
            $table->text('socmed_description');
            $table->string('socmed_status');
            $table->integer('client_swap_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smm');
    }
};
