<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('code', 50)->unique('CODE')->comment('ref code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_role')->index('id_role')->comment('role of the user depend of its profile');
            $table->timestamp('created_at')->useCurrent()->comment('creation date');
            $table->timestamp('updated_at')->useCurrent()->comment('update date');
            $table->tinyInteger('state');
        });

        User::insert([
            
                
                'code' => (string) Uuid::generate(),
                'first_name'=>"SUPER",
                'last_name'=>"ADMIN",
                'email'=>"superAdmin@gmail.com",
                'password'=> bcrypt("superadminnch"),
                'id_role'=>1001,
                'state'=>1,
                
    
            
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
