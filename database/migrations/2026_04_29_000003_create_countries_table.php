<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('flag')->default('🌍');
            $table->string('tab_name');
            $table->string('title');
            $table->text('desc_1');
            $table->text('desc_2')->nullable();
            $table->text('universities')->nullable();
            $table->string('fact_1_value')->nullable();
            $table->string('fact_1_label')->nullable();
            $table->string('fact_2_value')->nullable();
            $table->string('fact_2_label')->nullable();
            $table->string('fact_3_value')->nullable();
            $table->string('fact_3_label')->nullable();
            $table->json('services')->nullable();
            $table->string('apply_btn_text')->default('Apply Now');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
