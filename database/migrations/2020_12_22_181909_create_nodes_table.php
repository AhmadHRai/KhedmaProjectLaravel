<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('secondry_title')->nullable();
            $table->text('summary')->nullable();
            $table->longText('body')->nullable();
            $table->text('publish_date')->nullable();
            $table->text('path_img')->nullable();
            $table->text('img_discr')->nullable();
            $table->text('urlyoutube')->nullable();
            $table->integer('orders');
            $table->integer('top');
            $table->integer('status');
            $table->text('keywords')->nullable();
            $table->integer('source')->nullable();
            $table->integer('statistics');
            $table->text('slug')->nullable();
            $table->integer('rss')->nullable();
            $table->string('user_id_edit', 190)->nullable();
            $table->bigInteger('node_type_id')->unsigned();
            $table->foreign('node_type_id')->references('id')->on('node_types')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('cotegories')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('nodes');
    }
}
