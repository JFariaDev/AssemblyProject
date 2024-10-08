<?php

use App\Models\Organization;
use App\Models\Project;
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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date')->required();
            $table->string('sales_order')->required();
            $table->string('status')->required();
            $table->date('expected_shipment_date')->required();
            $table->string('notes')->nullable();
            $table->foreignIdFor(Organization::class)->constrained();
            $table->foreignIdFor(Project::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
