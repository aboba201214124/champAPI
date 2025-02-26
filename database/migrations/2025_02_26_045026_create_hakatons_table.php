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
        Schema::create('hakatons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('max_members_count');
            $table->text('description');
            $table->text('task');
            $table->date('start_date_begin');
            $table->date('start_date_end');
            $table->date('registration_date_begin');
            $table->date('registration_date_end');
            $table->integer('Owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hakatons');
    }
};
