<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\RegisterUserUseCase;
use App\Models\User;
use Core\BaseResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function register(Request $request){

        
        $data = (new RegisterUserUseCase())->__invoke($request);

        if($data == "Correo ya registrado."){
            return BaseResponse::response_object(400,null,$data);   
        }

    return BaseResponse::response_object(200,$data,"Usuario registrado correctamente");   }
}
