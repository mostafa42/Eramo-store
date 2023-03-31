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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('nickname_ar')->nullable();
            $table->string('nickname_en')->nullable();
            $table->text('slogan_ar')->nullable();
            $table->text('slogan_en')->nullable();
            $table->longText('summary_ar')->nullable();
            $table->longText('summary_en')->nullable();

            $table->text('emails')->nullable();
            $table->text('faxes')->nullable();
            $table->text('phone_numbers')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();

            $table->text('map_latitude')->nullable();
            $table->text('map_longitude')->nullable();
            $table->longText('map_iframe')->nullable();


            $table->string('currency_name_ar')->nullable();
            $table->string('currency_name_en')->nullable();



            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('tiktok_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('pinterest_link')->nullable();





            $table->text('keywords_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();





            $table->enum('status',[1,0])->default(1)->nullable();

            $table->string('logo')->nullable();
            $table->string('logo_light')->nullable();
            $table->text('youtube_video_link')->nullable();


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
        Schema::dropIfExists('app_settings');
    }
};
