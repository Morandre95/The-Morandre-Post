<?php

use App\Models\Consoles;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $consoles = ['PS4', 'PS5', 'Xbox One', 'Xbox Series X', 'Nintendo Switch', 'PC'];

        foreach ($consoles as $console) {
            Consoles::create([
                'name' => $console
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consoles');
    }
};
