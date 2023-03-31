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
            $table->string('title_ar')->unique();
            $table->string('title_en')->unique();
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->string('sku_number')->nullable();
            $table->string('model_number')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('keywords_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->string('primary_image')->nullable();
            $table->date('to')->nullable();

            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();

            $table->text('summary_ar')->nullable();
            $table->text('summary_en')->nullable();


            $table->text('instructions_ar')->nullable();
            $table->text('instructions_en')->nullable();
            $table->text('features_ar')->nullable();
            $table->text('features_en')->nullable();
            $table->text('extras_ar')->nullable();
            $table->text('extras_en')->nullable();



            $table->double('fake_price', 8, 2);
            $table->double('real_price', 8, 2);
            $table->double('purchase_price', 8, 2);
            $table->bigInteger('number_of_sales')->nullable()->default(0);
            $table->bigInteger('stock')->nullable()->default(0);
            $table->bigInteger('views')->nullable()->default(0);
            $table->enum('status',[1,0])->default(1)->nullable();
            $table->enum('add_products_together',[1,0])->default(0)->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('product_categories')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('main_category_id')->nullable();
            $table->foreign('main_category_id')->references('id')->on('product_categories')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('products');
    }
};
