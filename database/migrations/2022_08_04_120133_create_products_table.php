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
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("car_id");
            $table->foreign("car_id", "car_product_fk")->on("cars")->references("id");

            $table->unsignedBigInteger("engine_type_id");
            $table->foreign("engine_type_id", "engine_type_product_fk")->on("engine_types")->references("id");

            $table->unsignedBigInteger("drive_id");
            $table->foreign("drive_id", "drive_product_fk")->on("drives")->references("id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
