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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable()->unique();
            $table->double('total_products_price', 8, 2)->default(0)->nullable();
            $table->double('total_products_taxes', 8, 2)->default(0)->nullable();
            $table->double('total_products_price_with_taxes', 8, 2)->default(0)->nullable();
            $table->double('total_sum', 8, 2)->default(0)->nullable();
            $table->double('promo_discount', 8, 2)->default(0)->nullable();
            // $table->double('total_extra', 8, 2)->default(0)->nullable();
            // $table->double('extra', 8, 2)->default(0)->nullable();

            // $table->double('total_after_discount', 8, 2)->default(0)->nullable();

            $table->double('shipping', 8, 2)->default(0)->nullable();


            $table->string('promo_code_title')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('promo_codes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->foreign('shipping_id')->references('id')->on('shippings')->cascadeOnUpdate()->cascadeOnDelete();







            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('address_from_user')->nullable();

            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();



            $table->text('custom_address_from_admin')->nullable();
            $table->text('comment')->nullable();






            $table->unsignedBigInteger('inprogress_action_admin_id')->nullable();
            $table->unsignedBigInteger('delivered_action_admin_id')->nullable();
            $table->unsignedBigInteger('cancelled_action_admin_id')->nullable();

            $table->dateTime('inprogress_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();


            // $table->dateTime('cancelled_from_admin_at')->nullable();
            // $table->dateTime('cancelled_from_user_at')->nullable();

            $table->enum('cancelled_from',['user', 'admin'])->nullable();

            $table->foreign('inprogress_action_admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('delivered_action_admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('cancelled_action_admin_id')->references('id')->on('admins')->cascadeOnUpdate()->nullOnDelete();


            $table->enum('payment_type', ['COD', 'CASH'])->nullable()->default('COD');
            $table->string('payment_id')->nullable();
            $table->string('payment_name')->nullable();
            $table->double('payment_commission',8,2)->nullable();

            $table->enum('order_from',['web', 'android','ios','mobile'])->nullable();
            $table->enum('status', ['new','inprogress','delivered','cancelled',])->default('new');
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
        Schema::dropIfExists('orders');
    }
};
