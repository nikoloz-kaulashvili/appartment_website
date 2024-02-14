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
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->index()->nullable();
            $table->integer('district_id')->index()->nullable();
            $table->string('name_ge');
            $table->string('name_en');
            $table->string('address_ge');
            $table->string('address_en');
            $table->longText('map')->nullable();
            $table->longText('description_ge')->nullable();
            $table->longText('description_en')->nullable();
            $table->decimal('price', 8,2);
            $table->decimal('space', 8,2);
            $table->string('agreement_type')->index();
            $table->string('property_type')->index();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->string('repair')->index()->nullable();
            $table->string('heating')->index()->nullable();
            $table->string('storage')->index()->nullable();
            $table->string('parking')->index()->nullable();
            $table->integer('status')->index()->default(1);
            $table->integer('priority')->index()->default(1);

            // more
            $table->boolean('balcony')->default(false)->nullable();
            $table->boolean('porch')->default(false)->nullable();
            $table->boolean('loggia')->default(false)->nullable();
            $table->boolean('natural_gas')->default(false)->nullable();
            $table->boolean('Internet')->default(false)->nullable();
            $table->boolean('fireplace')->default(false)->nullable();
            $table->boolean('furniture')->default(false)->nullable();
            $table->boolean('passenger_elevator')->default(false)->nullable();
            $table->boolean('freight_elevator')->default(false)->nullable();
            $table->boolean('telephone')->default(false)->nullable();
            $table->boolean('tv')->default(false)->nullable();
            $table->boolean('conditioner')->default(false)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartments');
    }
};
