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
        Schema::create('users', function (Blueprint $table) {
            $table->string('code', 50)->unique('CODE')->comment('ref code');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::insert([
            DB::table('users')->insert([
                
                'code' => (string) Uuid::generate(),
                'document_type' => 2001,
                'document_number'=>11111111111,
                'first_name'=>"SUPER",
                'last_name'=>"ADMIN",
                'id_profile'=>1001,
                'email'=>"superAdmin@gmail.com",
                'password'=> bcrypt("superadminpx"),
                'code_auth'=>Str::random(10),
                'code_password'=>Str::random(10),
                "id_role"=>1001,
                'state'=>1,
                'nickname'=>'SuperUsuario'
    
            
        ])
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
