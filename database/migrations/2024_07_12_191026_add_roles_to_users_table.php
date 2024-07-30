<?php

use App\Models\User;
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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->nullable()->default(false);
            $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
        });
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('admin'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Writer',
            'email' => 'writer@writer.writer',
            'password' => bcrypt('writer'),
            'is_writer' => true
        ]);

        User::create([
            'name' => 'revisor',
            'email' => 'revisor@revisor.revisor',
            'password' => bcrypt('revisor'),
            'is_revisor' => true
        ]);

        User::create([
            'name' => 'all',
            'email' => 'all@all.all',
            'password' => bcrypt('all'),
            'is_admin' => true,
            'is_writer' => true,
            'is_revisor' => true

        ]);
        User::create([
            'name' => 'revisor',
            'email' => 'revisor@revisor.revisor',
            'password' => bcrypt('12345678'),
            'is_revisor' => true,
        ]);
        User::create([
            'name' => 'writer',
            'email' => 'writer@writer.writer',
            'password' => bcrypt('12345678'),

            'is_writer' => true,
        ]);
        User::create([
            'name' => 'all',
            'email' => 'all@all.all',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
            'is_revisor' => true,
            'is_writer' => true,
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'admin@admin.admin')->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin', 'is_revisor', 'is_writer');
        });
        User::where('email', 'revisor@revisor.revisor')->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin', 'is_revisor', 'is_writer');
        });
        User::where('email', 'writer@writer.writer')->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin', 'is_revisor', 'is_writer');
        });
        User::where('email', 'all@all.all')->delete();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin', 'is_revisor', 'is_writer');
        });
    }
};
