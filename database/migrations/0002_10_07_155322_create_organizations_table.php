<?php

use App\Models\Category;
use App\Models\Organization;
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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('slug')->unique();
            $table->string('status')->required();
            $table->timestamps();
        });

        Schema::create('organization_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('organization_operators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Organization::class)->constrained();
            $table->time('shifts');
            $table->dateTime('daysOff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
