<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function create(Request $request)
    {
        $random_string = $this->generateStringRandom();
        $validacion    = $this->validarTeonString(str_split($random_string));
        return response()->json(['code' => 200, 'message' => 'Creación satisfaactoria', 'data' => ['string_random' => $random_string, 'validacion' => $validacion]], 200);

    }

    public function generateStringRandom()
    {

        $abecedario        = 'abcdefghijklmnopqrstuvwxyz';
        $abecedario_length = strlen($abecedario);
        $random_string     = '';
        for ($i = 0; $i < 40; $i++) {
            $random_string .= $abecedario[rand(0, $abecedario_length - 1)];
        }
        return $random_string;
    }

    public function validarTeonString($random_string_array)
    {
        //$random_string_array    = ['a', 'b', 't', 'c', 'e', 'b', 'b', 'b', 'b', 'b', 'b', 'b'];
        $palabra_teon_array     = str_split('teonteach');
        $palabra_formada_maxima = '';
        $letras_inexistente     = '';
        $validacion_palabra     = true;

        for ($i = 0; $i < count($palabra_teon_array); $i++) {
            if (!in_array($palabra_teon_array[$i], $random_string_array)) {
                $letras_inexistente = $letras_inexistente . $palabra_teon_array[$i];
                $validacion_palabra = false;
            } else {
                if ($validacion_palabra) {
                    $palabra_formada_maxima = $palabra_formada_maxima . $palabra_teon_array[$i];
                }

            }
        }

        return ['validacion' => $validacion_palabra, 'palabra_formada_maxima' => $palabra_formada_maxima, 'letras_inexistente' => $letras_inexistente];

    }

}
