<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            // Informasi Toko
            $table->string('nama_pemilik')->nullable();
            $table->string('nama_toko')->nullable();
            $table->string('logo_toko_path')->nullable();
            $table->string('banner_toko_path')->nullable();
            // Informasi Aplikasi
            $table->string('nama_aplikasi')->nullable();
            $table->string('deskripsi_aplikasi')->nullable();
            $table->string('url_website_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            // Informasi Media Sosial
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->boolean('confirmed')->nullable();
            // Untuk Admin
            $table->boolean('requested')->nullable();
            
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
        Schema::dropIfExists('form_orders');
    }
}
