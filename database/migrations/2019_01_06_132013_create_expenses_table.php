<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('emp_id');
            $table->longText('note');
            $table->string('amount');
            $table->string('coordinate');
            $table->string('admin')->nullable();
            $table->string('c_approved')->default('pending');
            $table->string('a_approved')->default('pending');
            $table->string('sa_approved')->default('pending');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('expenses');
    }
}
