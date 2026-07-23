{{-- eventsテーブル --}}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('host_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('itinerary_id')->nullbable()->constrainded('itineraries')->nu110nDelete();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('meeting_place');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('capacity');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
