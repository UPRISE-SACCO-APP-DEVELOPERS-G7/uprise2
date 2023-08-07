<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('email');
            $table->double('loan_balance')->default(0.0);
            $table->double('deposit_balance')->default(0.0);
            $table->enum('type', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');
            $table->timestamps(); // This will automatically add `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};

