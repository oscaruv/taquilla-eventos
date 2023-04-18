<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Guest;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->bigInteger('identification')->unique();
            $table->string('firstname');
            $table->string('secondname');
            $table->string('lastname');
            $table->bigInteger('cellphone');
            $table->bigInteger('type');
            $table->integer('access');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
