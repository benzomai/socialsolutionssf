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
        Schema::table('clients', function (Blueprint $table) {
            // Modify the column to make it nullable
            $table->dateTime('date_updated')->nullable()->change();
            $table->text('business_brief')->nullable()->change();
            $table->text('drive_link')->nullable()->change();
            $table->text('trello_link')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->integer('swap_count')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
