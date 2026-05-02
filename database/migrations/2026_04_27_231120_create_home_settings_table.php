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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();

            // ── HERO SECTION ───────────────────────────────────
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('hero_cta1_text')->default('Apply Now');
            $table->string('hero_cta1_link')->nullable();
            $table->string('hero_cta2_text')->default('Contact Us');
            $table->string('hero_cta2_link')->nullable();
            $table->string('hero_visual_title')->nullable();
            $table->string('hero_visual_item1')->nullable();
            $table->string('hero_visual_item2')->nullable();
            $table->string('hero_visual_item3')->nullable();
            $table->string('hero_visual_item4')->nullable();

            // ── SERVICES OVERVIEW (только заголовки секции) ────
            $table->string('services_label')->default('What We Offer');
            $table->string('services_title')->default('Our Core Services');
            $table->string('services_subtitle')->nullable();

            // ── WHY US ─────────────────────────────────────────
            $table->string('whyus_label')->default('Why Choose Us');
            $table->string('whyus_title')->default('Trusted by Thousands of Students');
            $table->text('whyus_description')->nullable();

            // Why Us — 3 feature items
            $table->string('whyus_feature1_icon')->default('bi-shield-check-fill');
            $table->string('whyus_feature1_title')->default('Verified & Accredited');
            $table->string('whyus_feature1_subtitle')->nullable();

            $table->string('whyus_feature2_icon')->default('bi-clock-fill');
            $table->string('whyus_feature2_title')->default('24/7 Support');
            $table->string('whyus_feature2_subtitle')->nullable();

            $table->string('whyus_feature3_icon')->default('bi-translate');
            $table->string('whyus_feature3_title')->default('Multilingual Team');
            $table->string('whyus_feature3_subtitle')->nullable();

            // Stats
            $table->string('stat1_value')->default('5000+');
            $table->string('stat1_label')->default('Students Helped');

            $table->string('stat2_value')->default('50+');
            $table->string('stat2_label')->default('Partner Universities');

            $table->string('stat3_value')->default('12+');
            $table->string('stat3_label')->default('Countries');

            $table->string('stat4_value')->default('98%');
            $table->string('stat4_label')->default('Satisfaction Rate');

            // ── TESTIMONIALS (только заголовки секции) ─────────
            $table->string('testimonials_label')->default('Success Stories');
            $table->string('testimonials_title')->default('What Our Students Say');

            // ── FAQ (только заголовки секции) ──────────────────
            $table->string('faq_label')->default('FAQ');
            $table->string('faq_title')->default('Frequently Asked Questions');

            // ── CTA BANNER ─────────────────────────────────────
            $table->string('cta_title')->default('Ready to Start Your Journey?');
            $table->string('cta_subtitle')->nullable();
            $table->string('cta_button1_text')->default('Apply Now');
            $table->string('cta_button1_link')->default('contact.html');
            $table->string('cta_button2_text')->default('Contact Us');
            $table->string('cta_button2_link')->default('contact.html');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
