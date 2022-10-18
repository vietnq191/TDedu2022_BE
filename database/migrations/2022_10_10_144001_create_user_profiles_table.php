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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->string('full_name', 255);
            $table->string('mobile_phone', 255);
            $table->datetime('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['M', 'F', 'U'])->default('M');
            $table->softDeletes();
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
        Schema::dropIfExists('user_profiles');
    }
};
