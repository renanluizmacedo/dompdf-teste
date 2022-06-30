<?php

namespace App\Http\Controllers;


use Dompdf\Options;
use Illuminate\Support\Facades\App;

class GerarPDF extends Controller
{
    public function gerarPDF()
    {

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $caminho = '../resources/imgs/img.jpg';

        $a = ' <img src="' . $caminho . '" width="200">';

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($a);

        return $pdf->stream();
    }

}
