<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no');
            $table->string('invoice_type');
            $table->longText('invoice_path')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('invoice_description')->nullable();
            $table->bigInteger('invoice_total')->nullable();
            $table->string('reciever_gstin')->nullable();
            $table->string('reciever_companyname')->nullable();
            $table->string('reciever_address_1')->nullable();
            $table->string('reciever_address_2')->nullable();
            $table->string('reciever_contact')->nullable();
            $table->string('reciever_pan')->nullable();
            $table->string('sender_gstin')->nullable();
            $table->string('sender_companyname')->nullable();
            $table->string('sender_address_1')->nullable();
            $table->string('sender_address_2')->nullable();
            $table->string('sender_contact')->nullable();
            $table->string('sender_pan')->nullable();
            $table->json('items_table')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
