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
        Schema::create('company_specializations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');
            $table->foreignId('specialization_id')
            ->references('id')
            ->on('specializations')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_specializations');
    }
};
