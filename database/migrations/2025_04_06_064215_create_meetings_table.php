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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('client_id');
            $table->integer('project_id');
			$table->integer('host');
            $table->integer('location_id');
			$table->date('date');
			$table->time('start_time');
			$table->time('end_time');
			$table->tinyInteger('status');
			$table->tinyInteger('meeting_status');
			$table->tinyInteger('meeting_type')->nullable();
			$table->string('timezone');
			$table->integer('company_id');

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
        Schema::dropIfExists('meetings');
    }
};
