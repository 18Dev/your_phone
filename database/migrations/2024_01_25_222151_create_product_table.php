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
            $table->text('slug');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            // This is not a foreign key, this is the id of the product belonging to the tables
            $table->unsignedBigInteger('product_id');

            $table->tinyInteger('status');
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
