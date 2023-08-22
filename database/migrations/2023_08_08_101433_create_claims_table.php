<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->enum('status', ['RESOLVED', 'UNRESOLVED', 'IN_PROGRESS'])->default('UNRESOLVED');
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
