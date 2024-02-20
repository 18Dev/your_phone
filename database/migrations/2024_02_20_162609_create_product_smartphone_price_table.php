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
        Schema::create('product_smartphone_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('smartphone_attr_id');

            $table->string("ram")->nullable(); // RAM
            $table->string("storage_capacity")->nullable(); // Dung lượng lưu trữ
            $table->string('color'); // Màu sắc
            $table->string('price'); // Giá
            $table->bigInteger('quantity'); // Số lượng
            /**
             * ON_SALE = Còn hàng
             * STOP_SELLING = Hết hàng
             */
            $table->tinyInteger('status')->default(STOP_SELLING);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_smartphone_price');
    }
};
