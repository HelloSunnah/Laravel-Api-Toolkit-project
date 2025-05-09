<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id('agenda_id');
            $table->foreignId('meeting_id')->constrained('meetings');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('company_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
