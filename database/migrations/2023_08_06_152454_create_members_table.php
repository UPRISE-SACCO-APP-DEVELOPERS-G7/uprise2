<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_table', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("password");
            $table->string("phone");
            $table->string("email");
            $table->string("status");
            $table->string("membership_type");
            $table->string("registration_number");
            $table->string("physical_address");
            $table->string("postal_address");
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
        Schema::dropIfExists('members_table');
    }
};

