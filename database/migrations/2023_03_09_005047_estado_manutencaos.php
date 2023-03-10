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
        Schema::create('estado_manutencaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("estado");
            $table->date("data");
            $table->foreignId('registro_id')->constrained('registros')->references('id')->on('registros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
