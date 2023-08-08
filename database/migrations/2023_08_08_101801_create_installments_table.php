<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount');
            $table->date('due_date');
            $table->date('date_paid')->nullable();
            $table->enum('payment_status', ['CLEARED', 'NOT_CLEARED', 'OVERDUE'])->default('NOT_CLEARED');
            $table->unsignedBigInteger('loan_application_number');
            $table->timestamps(); // This will automatically add `created_at` and `updated_at` columns
            
            // Add foreign key constraint to the loans table
            $table->foreign('loan_application_number')->references('application_number')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
};
