<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainsettings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('phone2')->nullable();
            $table->text('email')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
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
        Schema::dropIfExists('mainsettings');
    }
}
