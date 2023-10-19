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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('father_fullname');
            $table->string('mother_fullname');
            $table->string('parent_contact_number');
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentprofiles');
    }
};
