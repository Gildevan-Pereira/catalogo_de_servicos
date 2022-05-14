<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // protected $table = "detalhes";

    public function up()
    {
        Schema::create('detalhes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_services')->contrained('services')->onDelete('cascade');
            $table->string('nome');
            $table->string('link');
            
            
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
        Schema::dropIfExists('detalhes');
        
        $table->id();
        $table->foreignId('id_services')->contrained('services')->onDelete('cascade');
        $table->string('nome');
        $table->string('link');
        
        
        $table->timestamps();
  
    }
}
