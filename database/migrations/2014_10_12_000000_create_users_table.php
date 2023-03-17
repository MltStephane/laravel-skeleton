<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private static function password(): string
    {
        if (app()->isLocal()) {
            return Hash::make('stephane@mulot.dev');
        }

        return str()->password(12, true, true, false, false);
    }

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::forceCreate([
            'name' => 'MltStephane',
            'email' => 'stephane@mulot.dev',
            'email_verified_at' => now(),
            'password' => self::password(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
