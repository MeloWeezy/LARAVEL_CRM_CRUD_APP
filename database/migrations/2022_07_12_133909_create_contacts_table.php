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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('city');
            $table->string('phone');
            $table->string('country');
            $table->string('region');
            $table->string('address');
            $table->string('postal_code');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('accounts_id')->constrained()->onUpdate('cascade')->nullable();
            $table->bigInteger('organizations_id')->index()->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
