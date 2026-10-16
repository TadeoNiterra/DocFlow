<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            $table->index('status', 'idx_doc_ver_status');
            $table->index(['document_id', 'status'], 'idx_doc_ver_doc_status');
            $table->index('created_by_id', 'idx_doc_ver_created_by');
            $table->index('reviewed_by_id', 'idx_doc_ver_reviewed_by');
        });
    }

    public function down(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            $table->dropIndex('idx_doc_ver_status');
            $table->dropIndex('idx_doc_ver_doc_status');
            $table->dropIndex('idx_doc_ver_created_by');
            $table->dropIndex('idx_doc_ver_reviewed_by');
        });
    }
};