<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_add_cognito_id_to_users_table.php
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cognito_id')->nullable()->unique()->after('id');
            $table->string('password')->nullable()->change(); // Hacemos la contraseña opcional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
