<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dprs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('month');
            $table->string('project');
            $table->string('customer');
            $table->string('circle');
            $table->string('cluster')->nullable();
            $table->string('site_id_a');
            $table->string('site_id_b');
            $table->string('site_name_a');
            $table->string('site_name_b');
            $table->string('link_id');
            $table->string('site_type');
            $table->string('activity_type')->nullable();
            $table->string('sow');
            $table->string('quantity');
            $table->string('rate');
            $table->string('amount');
            $table->string('payterm');
            $table->string('first_mile_amount');
            $table->date('allocation_date')->nullable();
            $table->date('integration_date')->nullable();
            $table->date('dismentale_date')->nullable();
            $table->date('at_date')->nullable();
            $table->string('at_status')->nullable();
            $table->date('site_completion_date')->nullable();
            $table->string('completion_status')->nullable();
            $table->string('anteena_size')->nullable();
            $table->string('tower_type_a')->nullable();
            $table->string('tower_type_b')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('wcc_status')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_amount')->nullable();
            $table->string('invoice_state')->nullable();
            $table->string('po_number')->nullable();
            $table->string('po_status')->nullable();
            $table->string('team_name')->nullable();
            $table->string('done_by')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_rate')->nullable();
            $table->string('vendor_payment_status')->nullable();
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
        Schema::dropIfExists('dprs');
    }
}
