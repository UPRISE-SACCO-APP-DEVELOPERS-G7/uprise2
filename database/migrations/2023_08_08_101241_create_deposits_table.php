<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits_table', function (Blueprint $table) {
            $table->bigIncrements('receipt_number');
            $table->double('amount');
            $table->string('name')->nullbale();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->timestamps(); // This will automatically add `created_at` and `updated_at` columns
            
            // Add foreign key constraint to the members table
            $table->foreign('member_id')->references('id')->on('members_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
};
