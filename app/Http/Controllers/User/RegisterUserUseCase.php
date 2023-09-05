<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Core\BaseResponse;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class RegisterUserUseCase extends Controller
{
    public function __invoke(Request $request ){
        // validar si el email ya existe
        if(!is_null(User::where("email", $request->email)->first())){
            return "Correo ya registrado.";
        }

        $user = new User();
        $user->code = (string) Uuid::generate();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;   
        $user->email = $request->email;
        $user->password = $request->password;    
        $user->id_role = $request->id_role;    
        $user->state = $request->state;  
        $user->save();


        

        return $user;
    }
}
