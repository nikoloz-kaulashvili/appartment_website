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
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('name_ka');
            $table->string('name_en');
            $table->string('address_ka');
            $table->string('address_en');
            $table->longText('description_ka');
            $table->longText('description_en');
            $table->decimal('price', 8,2);
            $table->decimal('space', 8,2);
            // image
            $table->integer('agreement_type');
            $table->integer('property_type');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('repair');
            $table->integer('heating');
            $table->integer('storage');
            $table->integer('status')->default(1);
            $table->integer('priority')->default(1);

            // more
            $table->boolean('balcony')->default(false);
            $table->boolean('porch')->default(false);
            $table->boolean('loggia')->default(false);
            $table->boolean('natural_gas')->default(false);
            $table->boolean('Internet')->default(false);
            $table->boolean('fireplace')->default(false);
            $table->boolean('furniture')->default(false);
            $table->boolean('passenger_elevator')->default(false);
            $table->boolean('freight_elevator')->default(false);
            $table->boolean('telephone')->default(false);
            $table->boolean('tv')->default(false);
            $table->boolean('conditioner')->default(false);





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
