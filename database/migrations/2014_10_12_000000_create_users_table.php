<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('account_name');
            $table->string('account_number')->unique();
            $table->string('bank_name');
            $table->boolean('admin')->default(0);
            $table->string('current_investment')->default(0);
            $table->string('times_invested')->default(0);
            $table->string('invested_on')->nullable();
            $table->string('withdrawable_amount')->default(0);
            $table->string('total_amount_invested')->default(0);
            $table->boolean('made_recommitment')->default(0);
            $table->string('total_amount_withdrawn')->default(0);
            $table->enum('awaiting_approval', ['awaiting', 'not_verified', 'verified', 'declined'])->default('not_verified');
            $table->boolean('investment_confirmed')->default(0);
            $table->string('bonus')->default(0);
            $table->string('upline')->default('N/A');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
