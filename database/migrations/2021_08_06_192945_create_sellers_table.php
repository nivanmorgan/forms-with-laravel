<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('first');
            $table->string('last');
            $table->string('portfolio_url');
            $table->boolean('has_store')->default(0);
            $table->unique(array('first', 'last','portfolio_url','has_store'));
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->index();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->enum('category', ["graphics", "fonts", "templates", "add-ons", "photos", "web themes", "3d"]);
            $table->text('store_url')->nullable()->default(NULL);
            $table->text('quality_level')->default(0);;
            $table->text('experience_level')->default(0);;
            $table->text('business_level')->default(0);;
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
        Schema::dropIfExists('sellers');
    }
}
