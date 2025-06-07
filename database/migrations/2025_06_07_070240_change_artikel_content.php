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
        //
        Schema::table('blogku', function (Blueprint $table) {
            // Mengubah kolom 'content' menjadi tipe text
            $table->text('content')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('blogku', function (Blueprint $table) {
            $table->string('content',255)->change(); // Mengembalikan ke tipe string jika perlu
        });
    }
};
