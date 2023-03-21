<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id('folio');
            $table->foreignId('product_id');
            $table->foreignId('appointment_id');
            $table->foreignId('cashRegisterCut_id');
            $table->timestamps();
            $table->softDeletes();
            
            
            //ForeignKeys
            $table->foreign('product_id')->references('code')->on('products');

            $table->foreign('appointment_id')->references('id')->on('appointment');

            $table->foreign('cashRegisterCut_id')->references('id')->on('cash_registers_cut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
