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
        Schema::rename('films_actor', 'actor_film');
    }

    /**x
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('actor_film', 'films_actor');
    }
};
