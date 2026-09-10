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
        Schema::create('software_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('ubication');
            $table->string('clasification');
            $table->integer('User')->unsigned();
            $table->integer('Admin')->unsigned();
            $table->date('installationDate');
            $table->string('proposal', 255)->nullable();
            $table->boolean('secury')->default(true);
            $table->string('licenseType', 255);
            $table->integer('license');
            $table->boolean('status')->default(true);
            $table->string('aprobation')->nullable();
            $table->string('area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_lists');
    }
};