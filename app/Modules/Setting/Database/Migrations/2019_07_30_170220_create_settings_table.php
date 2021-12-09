<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('main_navbar_color')->nullable();
            $table->text('secondary_navbar_color')->nullable();
            $table->text('page_header_color')->nullable();

            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('website')->nullable();
            $table->string('company_copyright')->nullable();
            $table->string('company_email')->nullable();

            $table->string('contact_no1')->nullable();
            $table->string('contact_no2')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();

            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('linkin_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();

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
        Schema::dropIfExists('settings');
    }
}