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
        Schema::create('meeting_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->foreigId();
			$table->string('name');
			$table->text('description')->nullable();
			$table->integer('total_seat')->nullable();
			$table->integer('serial')->nullable();
			$table->integer('status')->default(1);

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
        Schema::dropIfExists('meetingLocations');
    }
};
