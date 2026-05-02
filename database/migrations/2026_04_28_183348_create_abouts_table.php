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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            // ── SECTION 1: WHO WE ARE ───────────────────────────
            $table->string('who_label')->default('Who We Are');
            $table->string('who_title')->default('More Than Just a Consultancy');
            $table->text('who_description_1')->nullable(); // First paragraph
            $table->text('who_description_2')->nullable(); // Second paragraph

            // Checkbox items (4 items)
            $table->string('check1_text')->default('Official University Partner');
            $table->string('check2_text')->default('Licensed Consultancy');
            $table->string('check3_text')->default('4 Languages Supported');
            $table->string('check4_text')->default('98% Success Rate');

            // ── SECTION 2: OUR STORY (The Dark Box) ──────────────
            $table->string('story_title')->default('Our Story');
            $table->text('story_description')->nullable();
            $table->string('story_stat1_value')->default('2012');
            $table->string('story_stat1_label')->default('Founded');
            $table->string('story_stat2_value')->default('80+');
            $table->string('story_stat2_label')->default('Team Members');
            $table->string('story_stat3_value')->default('12');
            $table->string('story_stat3_label')->default('Countries');

            // ── SECTION 3: MISSION & VISION ─────────────────────
            $table->string('mission_section_label')->default('Our Purpose');
            $table->string('mission_label')->default('Mission & Vision');
            $table->string('mission_title')->default('Our Mission');
            $table->text('mission_text')->nullable();
            $table->string('mission_item1')->nullable();
            $table->string('mission_item2')->nullable();
            $table->string('mission_item3')->nullable();

            $table->string('vision_title')->default('Our Vision');
            $table->text('vision_text')->nullable();
            $table->string('vision_item1')->nullable();
            $table->string('vision_item2')->nullable();
            $table->string('vision_item3')->nullable();

            // ── SECTION 4: TRACK RECORD (Counters) ──────────────
            $table->string('stat1_number')->default('5000');
            $table->string('stat1_suffix')->default('+');
            $table->string('stat1_text')->default('Students Helped');

            $table->string('stat2_number')->default('50');
            $table->string('stat2_suffix')->default('+');
            $table->string('stat2_text')->default('Partner Universities');

            $table->string('stat3_number')->default('12');
            $table->string('stat3_suffix')->default('+');
            $table->string('stat3_text')->default('Countries');

            $table->string('stat4_number')->default('98');
            $table->string('stat4_suffix')->default('%');
            $table->string('stat4_text')->default('Satisfaction Rate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
