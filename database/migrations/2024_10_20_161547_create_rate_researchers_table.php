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
        Schema::create('rate_researchers', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger("researcher_id");
            $table->foreign("researcher_id")->references('id')->on("researchers")->onDelete("cascade");
            
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references('id')->on("companies")->onDelete("cascade");

            $table->string("rate");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate_researchers');
    }
};
