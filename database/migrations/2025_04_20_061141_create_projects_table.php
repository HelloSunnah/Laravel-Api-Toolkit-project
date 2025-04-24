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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->foreigId();
			$table->integer('client_id')->foreignId();
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('owner_name')->nullable();
			$table->time('start_time')->nullable();
			$table->time('end_time')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
