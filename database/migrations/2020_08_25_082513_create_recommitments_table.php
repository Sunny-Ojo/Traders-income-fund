<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommitments', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('user_id');
            $table->string('name_of_sender');
            $table->string('screenshot');
            $table->boolean('confirmed')->default(0);
            $table->string('withdrawable_amount');
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
        Schema::dropIfExists('recommitments');
    }
}
