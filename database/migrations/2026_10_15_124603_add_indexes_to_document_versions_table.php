<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            $table->index('status');
            $table->index(['document_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['document_id', 'status']);
        });
    }
};