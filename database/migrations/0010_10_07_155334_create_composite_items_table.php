<?php

use App\Models\CompositeItem;
use App\Models\Item;
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
        Schema::create('composite_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('partCode')->unique();
            $table->timestamps();
        });

        Schema::create('composite_item_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->constrained();
            $table->foreignIdFor(CompositeItem::class)->constrained();
            $table->string('partCode')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composite_items');
    }
};
