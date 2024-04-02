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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_name');
            $table->integer('assigned_user');
            $table->integer('assign_smm');
            $table->string('client_email');
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
            $table->text('business_brief');
            $table->text('drive_link');
            $table->text('trello_link');
            $table->text('plan');
            $table->string('status');
            $table->integer('swap_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
