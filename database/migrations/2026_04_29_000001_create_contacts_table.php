<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // ── Hero Section ──────────────────────────────────────
            $table->string('hero_title')->default('Get in Touch');
            $table->text('hero_desc')->nullable();

            // ── Contact Info ──────────────────────────────────────
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('working_hours')->nullable();

            // ── Social Links ──────────────────────────────────────
            $table->string('social_fb')->nullable();
            $table->string('social_ig')->nullable();
            $table->string('social_wa')->nullable();

            // ── FAQ ───────────────────────────────────────────────
            $table->json('faq')->nullable();

            // ── Map ───────────────────────────────────────────────
            $table->text('map_src')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
