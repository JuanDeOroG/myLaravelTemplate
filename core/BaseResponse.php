<?php

namespace Core;

use DateTime;


class BaseResponse
{

    public static function response_array($code = 400, $data = null, $message = "default message")
    {   
        $now = new DateTime();
        
        $now->modify("+60 minutes");
        $expire = strtotime($now->format("Y-m-d H:i:s"));
        return ["data" => $data , "code" => $code, "message" => $message,"newExpTime" => $expire];
    }

    public static function response_object($code = 400, $data = null, $message = "default message")
    {
        $array = BaseResponse::response_array($code, $data, $message);
        return response()->json($array);
    }
}
