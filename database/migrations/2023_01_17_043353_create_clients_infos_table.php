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
        Schema::create('clients_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->date('birth_date')->nullable();
            $table->float('OD_Sph')->nullable();
            $table->float('OD_Cyl')->nullable();
            $table->float('OD_ax')->nullable();
            $table->float('OS_Sph')->nullable();
            $table->float('OS_Cyl')->nullable();
            $table->float('OS_ax')->nullable();
            $table->float('Dpp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_infos');
    }
};
