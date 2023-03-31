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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->double('value', 8, 2);
            $table->integer('maximum_times_of_use')->default(100);
            $table->integer('count_of_use')->default(0);
            $table->enum('dedicated_to',['all_users','females','males','spacial_user'])->default('all_users')->nullable();
            $table->enum('type',['percent','amount'])->default('amount')->nullable();
            $table->enum('status',[1,0])->default(1)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('promo_codes');
    }
};
