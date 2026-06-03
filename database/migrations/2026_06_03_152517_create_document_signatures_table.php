<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_signatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_version_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained(); 

            
            $table->string('user_name_snapshot'); 
            $table->string('user_email_snapshot');
            $table->string('ip_address');
            $table->string('user_agent'); 

            
            $table->text('signature_hash'); 

            $table->timestamp('signed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_signatures');
    }
};