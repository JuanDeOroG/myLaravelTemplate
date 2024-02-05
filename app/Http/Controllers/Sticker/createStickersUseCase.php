<?php

namespace App\Http\Controllers\Sticker;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sticker\generateCodesUseCase;

use Illuminate\Support\Facades\Storage;

class createStickersUseCase extends Controller
{
    public function __invoke(){

        $codes = (new generateCodesUseCase())->__invoke();
       
        // para guardar el pdf primero tiene que existir la ruta, no crea las carpetas automaticamente, ya las carpetas tienen que estar creadas
        if (!Storage::exists('carnets')) {
            Storage::makeDirectory('carnets');
        }
        set_time_limit(5000);
        foreach($codes as $code){
            $code0 = $code[0];
            $code1 = $code[1];
            $pdf = PDF::loadView('tickets', compact('code1','code0'));
            $pdf->setPaper([0,0,283.465,70.8661],'portrait');
                
            $pdf->save(storage_path('app/carnets81/')."$code0"."-". "$code1.pdf");
        }
    
        

    }
}
