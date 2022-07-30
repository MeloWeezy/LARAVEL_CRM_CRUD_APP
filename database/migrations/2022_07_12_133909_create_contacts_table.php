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
        Schema::create('contact', function (Blueprint $table) {
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
            $table->foreignId('account_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('organization_id')->index()->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
