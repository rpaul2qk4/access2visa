<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dump_files', function (Blueprint $table) {
            $table->id();
			$table->string('vfile')->nullable();
			$table->string('title');
			
			$table->foreignId('visa_type_id')->nullable();
			$table->foreign('visa_type_id')->references('id')->on('visa_types');
			
			$table->foreignId('country_id')->nullable();
			$table->foreign('country_id')->references('id')->on('countries');		
						
			$table->foreignId('created_by')->nullable();
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->foreignId('updated_by')->nullable();
			$table->foreign('updated_by')->references('id')->on('users'); 
			
			$table->unique(['country_id' , 'visa_type_id', 'title'],'visa_country_title_id');	
			
			$table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dump_files');
    }
};
