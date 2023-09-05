<?php

namespace Core;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaseUseCase extends Controller
{

    public function safeInvoke($request)
    {
        try {

            DB::beginTransaction();

            $response = $this->__invoke($request);
    
            DB::commit();

            return $response;

        } catch (\Throwable $th) {

            DB::rollBack();

            return  BaseResponse::response_array(501,null,$th->getMessage());
            
        }
    }

}