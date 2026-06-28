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

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->longText('description');

            $table->decimal('price', 10, 2)->nullable();

            $table->enum('price_type', [
                'fixed',
                'hourly',
                'quote'
            ])->default('fixed');

            $table->enum('delivery_time', [
                '24h',
                '2d',
                '5d',
                '1w',
                'more',
                'custom'
            ])->default('5d');

            $table->enum('revisions', [
                '0',
                '1',
                '2',
                '3',
                'unlimited'
            ])->default('1');

            $table->enum('status', [
                'draft',
                'pending',
                'active',
                'inactive',
                'rejected'
            ])->default('draft');

            $table->boolean('featured')->default(false);

            $table->unsignedInteger('views')->default(0);

            $table->timestamps();

            $table->softDeletes();
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
