<?php

namespace App\Http\Controllers\Sticker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class generateCodesUseCase extends Controller
{
    //

    public function __invoke(){

        $codes = [];

        $year = 2024;
        
        $nums = 81999;

        while($nums >=81000){

            $codes[]= [$year."AB00".$nums-1,$year."AB00".$nums];
            $nums = $nums -2;
        }

        return $codes;
    }
}
