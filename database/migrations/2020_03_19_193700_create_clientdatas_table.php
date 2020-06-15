<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientdatas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->integer('client_id')->unsigned()->index();
                $table->integer('payee_id')->unsigned()->index()->nullable();
                $table->string('amount');
                $table->string('deposit_date');
                $table->string('end_date');
                $table->string('designation');
                $table->string('type_check');
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientdatas');
    }
}
