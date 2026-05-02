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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // ── SERVICE 1: ADMISSION ───────────────────────────
            $table->string('admission_label')->default('Service 01');
            $table->string('admission_title')->default('University Admission Support');
            $table->text('admission_description')->nullable();

            // Admission Features (3 items)
            $table->string('admission_feature1_title')->default('University Shortlisting');
            $table->text('admission_feature1_text')->nullable();

            $table->string('admission_feature2_title')->default('Application Documents');
            $table->text('admission_feature2_text')->nullable();

            $table->string('admission_feature3_title')->default('Visa & Enrollment');
            $table->text('admission_feature3_text')->nullable();

            $table->string('admission_button_text')->default('Get Started');
            $table->string('admission_button_link')->default('contact.html');

            // How It Works (3 steps)
            $table->string('admission_step1_title')->default('Free Consultation');
            $table->string('admission_step1_text')->nullable();

            $table->string('admission_step2_title')->default('University Match');
            $table->string('admission_step2_text')->nullable();

            $table->string('admission_step3_title')->default('Apply & Get Accepted');
            $table->string('admission_step3_text')->nullable();

            // ── SERVICE 2: AIRPORT PICKUP ──────────────────────
            $table->string('airport_label')->default('Service 02');
            $table->string('airport_title')->default('Airport Pickup Service');
            $table->text('airport_description')->nullable();

            // Airport Features (3 items)
            $table->string('airport_feature1_title')->default('Guaranteed On-Time');
            $table->text('airport_feature1_text')->nullable();

            $table->string('airport_feature2_title')->default('Professional Drivers');
            $table->text('airport_feature2_text')->nullable();

            $table->string('airport_feature3_title')->default('Comfortable Vehicles');
            $table->text('airport_feature3_text')->nullable();

            $table->string('airport_button_text')->default('Book a Pickup');
            $table->string('airport_button_link')->default('contact.html');

            // What's Included (4 items)
            $table->string('airport_included1_icon')->default('bi-person-badge-fill');
            $table->string('airport_included1_text')->default('Name sign at airport');

            $table->string('airport_included2_icon')->default('bi-luggage-fill');
            $table->string('airport_included2_text')->default('Luggage assistance');

            $table->string('airport_included3_icon')->default('bi-car-front-fill');
            $table->string('airport_included3_text')->default('Private vehicle');

            $table->string('airport_included4_icon')->default('bi-phone-fill');
            $table->string('airport_included4_text')->default('24/7 driver contact');

            // ── SERVICE 3: ACCOMMODATION ───────────────────────
            $table->string('accommodation_label')->default('Service 03');
            $table->string('accommodation_title')->default('Accommodation & Settling In');
            $table->text('accommodation_description')->nullable();

            // Accommodation Features (3 items)
            $table->string('accommodation_feature1_title')->default('Pre-Arranged Housing');
            $table->text('accommodation_feature1_text')->nullable();

            $table->string('accommodation_feature2_title')->default('Settling-In Support');
            $table->text('accommodation_feature2_text')->nullable();

            $table->string('accommodation_feature3_title')->default('Ongoing Assistance');
            $table->text('accommodation_feature3_text')->nullable();

            $table->string('accommodation_button_text')->default('Find Housing');
            $table->string('accommodation_button_link')->default('contact.html');

            // Housing Options (4 items)
            $table->string('housing_option1_icon')->default('bi-building');
            $table->string('housing_option1_title')->default('University Dormitories');
            $table->string('housing_option1_subtitle')->default('On-campus, safe, all-inclusive');
            $table->boolean('housing_option1_popular')->default(true);

            $table->string('housing_option2_icon')->default('bi-houses');
            $table->string('housing_option2_title')->default('Shared Apartments');
            $table->string('housing_option2_subtitle')->default('Near campus, budget-friendly');
            $table->boolean('housing_option2_popular')->default(false);

            $table->string('housing_option3_icon')->default('bi-house');
            $table->string('housing_option3_title')->default('Private Rooms');
            $table->string('housing_option3_subtitle')->default('More privacy, flexible lease');
            $table->boolean('housing_option3_popular')->default(false);

            $table->string('housing_option4_icon')->default('bi-hotel');
            $table->string('housing_option4_title')->default('Temporary Stay');
            $table->string('housing_option4_subtitle')->default('First week while you settle in');
            $table->boolean('housing_option4_popular')->default(false);

            // ── SERVICE 4: CONSULTATION ────────────────────────
            $table->string('consultation_label')->default('Service 04');
            $table->string('consultation_title')->default('Student Consultation');
            $table->string('consultation_subtitle')->nullable();

            // Consultation Cards (4 items)
            $table->string('consultation_card1_icon')->default('bi-chat-dots-fill');
            $table->string('consultation_card1_title')->default('Free Initial Session');
            $table->text('consultation_card1_text')->nullable();

            $table->string('consultation_card2_icon')->default('bi-journals');
            $table->string('consultation_card2_title')->default('Academic Planning');
            $table->text('consultation_card2_text')->nullable();

            $table->string('consultation_card3_icon')->default('bi-cash-coin');
            $table->string('consultation_card3_title')->default('Scholarship Guidance');
            $table->text('consultation_card3_text')->nullable();

            $table->string('consultation_card4_icon')->default('bi-headset');
            $table->string('consultation_card4_title')->default('Ongoing Support');
            $table->text('consultation_card4_text')->nullable();

            // ── CTA ────────────────────────────────────────────
            $table->string('cta_title')->default('Start With a Free Consultation');
            $table->string('cta_subtitle')->nullable();
            $table->string('cta_button_text')->default('Book Free Session');
            $table->string('cta_button_link')->default('contact.html');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
