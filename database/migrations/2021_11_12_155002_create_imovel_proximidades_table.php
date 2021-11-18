<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelProximidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_proximidades', function (Blueprint $table) {
            $table
                ->foreignId('proximidade_id')
                ->constrained()
                ->onDelete('cascade');
            $table
                ->foreignId('imovel_id')
                ->constrained('imoveis')
                ->onDelete('cascade');
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
        Schema::dropIfExists('imovel_proximidades');
    }
}
