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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->unique();
            $table->string('title_en')->unique();
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->text('summary_ar')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('keywords_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',[1,0])->default(1)->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('product_categories')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('product_categories');
    }
};
