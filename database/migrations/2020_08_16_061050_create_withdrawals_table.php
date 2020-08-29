<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->enum('awaiting_payment', ['awaiting', 'paid'])->default('awaiting');
            $table->string('withdrawable_amount');
            $table->string('name_of_receiver');
            $table->string('amount');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('phone');
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
        Schema::dropIfExists('withdrawals');
    }
}
