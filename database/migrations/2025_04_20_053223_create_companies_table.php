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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('abbreviation')->nullable();
			$table->text('description')->nullable();
			$table->string('slogan')->nullable();
			$table->string('details')->nullable();
			$table->string('address')->nullable();
			$table->string('website')->nullable();
			$table->string('phone_1')->nullable();
			$table->string('phone_2')->nullable();
			$table->string('phone_3')->nullable();
			$table->string('mobile')->nullable();
			$table->string('email')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
