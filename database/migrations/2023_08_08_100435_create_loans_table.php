<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('application_number');
            $table->double('interest_rate');
            $table->double('amount');
            $table->integer('payment_period');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('request_status', ['PENDING', 'SHORTLISTED', 'APPROVED', 'DISAPPROVED', 'ACCEPTED', 'REJECTED'])->default('PENDING');
            $table->string('rejection_reason')->nullable();
            $table->unsignedBigInteger('member_id');
            $table->timestamps(); // This will automatically add `created_at` and `updated_at` columns
            $table->integer('installment_count')->nullable();
            $table->decimal('installment_amount', 10, 2)->nullable();
            // Add foreign key constraint to the members table
            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('loans', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn('installment_count');
            $table->dropColumn('installment_amount');
        });
    
        Schema::dropIfExists('loans');
        
    }
};
