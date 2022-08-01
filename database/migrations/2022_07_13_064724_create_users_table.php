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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->string('photo_path')->nullable();
            $table->text('phone');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
<<<<<<< HEAD
            $table->foreignId('organizations_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('accounts_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
           
=======
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
