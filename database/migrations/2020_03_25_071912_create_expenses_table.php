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
            $table->bigIncrements('id');
            $table->string('unid')->nullable();
            $table->bigInteger('date')->nullable();
            $table->float('amount')->nullable();
            $table->boolean('active')->nullable();
            $table->string('business_id')->nullable();
            $table->string('trans_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('type')->nullable();
            $table->string('other_title')->nullable();
            $table->string('details')->nullable();
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
