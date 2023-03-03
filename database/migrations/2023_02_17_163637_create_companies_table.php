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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            // Type 'SARL' Or 'SA' ...
            $table->string('type');
            // Stage 'Démarrage' ..
            $table->string('stage');
            $table->string('logo');
            $table->string('meta_description');
            $table->text('description');
            $table->date('founded_at');
            $table->string('slogan')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('video')->nullable();
            $table->boolean('visibility');

            $table->foreignId('office_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
