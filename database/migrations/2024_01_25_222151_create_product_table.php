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
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->tinyInteger('status');
            /**
             * @Json
             * Ex: {color: {red, black, ...}}
             */
            $table->text('color')->nullable();
            /**
             * @Json
             * Ex: {option_1: {color: red, storage_capacity: 256GB, price: 18.000.000}, ...}
             */
            $table->text('price')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
