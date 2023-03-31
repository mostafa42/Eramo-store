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
        Schema::create('why_we_choose_footers', function (Blueprint $table) {
            $table->id();
            $table->text("title_ar");
            $table->text("title_en");
            $table->text("link_ar");
            $table->text("link_en");
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
        Schema::dropIfExists('why_we_choose_footers');
    }
};
