<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('festival_type', function (Blueprint $table) {

            $table->integer('festival_id');
            $table->integer('type_id');

            $table->primary(['festival_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');

        Schema::dropIfExists('festival_type');

    }
}
