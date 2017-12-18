<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ReferenceController extends Controller
{
    public function condensedDate()
    {
        $date = new Carbon('2014-11-19');

        $a = ($date->year - 2013)*372;
        $m = ($date->month - 1)*31;
        $d = $date->day -1;
        $suma = $a+$m+$d;
        echo $suma;
    }

    public function condensedAmount()
    {
        $monto = 1400;
        $x = (float)$monto;
        $x_entero = (int)$monto;
        $resultado = 0;

        if ($x - $x_entero) {
            $decimales = explode(".", $monto);
            if (strlen($decimales[1])==1) {
                $decimal = $decimales[1].'0';
                $monto = $decimales[0].$decimal;
            } else {
                $monto = $decimales[0].$decimales[1];
            }
        } else {
            $monto = $monto."00";
        }
        // Imprimimos variables
        echo $x;
        echo "<br>";
        echo $x_entero;
        echo "<br>";
        echo $monto;
        echo "<br>";
        echo strlen($monto);
        //
        $data_num[1] = 7;
        $data_num[2] = 3;
        $data_num[3] = 1;
        $index = 1;

        for ($i=strlen($monto)-1; $i >=0; $i--) {
            $multi = $monto[$i]*$data_num[$index];
            $resultado = $resultado + $multi;
            $index++;
            if ($index==4) {
                $index=1;
            }
        }

        $importe_condensado = $resultado%10;

        echo "<br>";
        echo "<h1>".$importe_condensado."</h1>";
    }

    public function generateReference(Request $request)
    {
        $reference = $request->input('reference');
        $date_limit = $request->input('date_limit');
        $amount = $request->input('amount');
        /*
        *
        * generateBanorte
        */
        // Generate amount
        $monto = $amount;
        $x = (float)$monto;
        $x_entero = (int)$monto;
        $resultado = 0;

        if ($x - $x_entero) {
            $decimales = explode(".", $monto);
            if (strlen($decimales[1])==1) {
                $decimal = $decimales[1].'0';
                $monto = $decimales[0].$decimal;
            } else {
                $monto = $decimales[0].$decimales[1];
            }
        } else {
            $monto = $monto."00";
        }

        $data_num[1] = 7;
        $data_num[2] = 3;
        $data_num[3] = 1;
        $index = 1;

        for ($i=strlen($monto)-1; $i >=0; $i--) {
            $multi = $monto[$i]*$data_num[$index];
            $resultado = $resultado + $multi;
            $index++;
            if ($index==4) {
                $index=1;
            }
        }

        $importe_condensado = $resultado%10;

        // Generate date
        $date = new Carbon($date_limit);

        $a = ($date->year - 2013)*372;
        $m = ($date->month - 1)*31;
        $d = $date->day -1;
        $suma = $a+$m+$d;

        $referencia_integrada = $reference.$suma.$importe_condensado.'2';
        // Digitos verificadores
        $data_n[1] = 11;
        $data_n[2] = 13;
        $data_n[3] = 17;
        $data_n[4] = 19;
        $data_n[5] = 23;
        $index = 1;
        $resultado = 0;
        for ($i=strlen($referencia_integrada)-1; $i >=0 ; $i--) {
            $resultado = $resultado + ($referencia_integrada[$i]*$data_n[$index]);
            $index++;
            if ($index==6) {
                $index=1;
            }
        }
        $digito_verificador = ($resultado%97)+1;
        if (strlen($digito_verificador)==1) {
            $digito_verificador = '0'.$digito_verificador;
        }
        // echo "<strong>Número de referencia: </strong>";
        // echo "<br>";
        $referencia = $referencia_integrada.$digito_verificador;
        echo "<h1>Banorte: ".$referencia."</h1>";
        echo "<br>";
        /*
        *
        * generateSantander
        */
        // Generate date
        $date_santander = new Carbon($date_limit);

        $a_s = ($date->year - 2009)*372;
        $m_s = ($date->month - 1)*31;
        $d_s = $date->day -1;
        $suma_s = $a_s+$m_s+$d_s;
        $fecha_condensada = substr($suma_s,0,4);
        // Generate amount
        $monto_s = $amount;
        $x_s = (float)$monto;
        $x_entero_s = (int)$monto;
        $resultado_s = 0;

        if ($x_s - $x_entero_s) {
            $decimales_s = explode(".", $monto_s);
            if (strlen($decimales_s[1])==1) {
                $decimal_s = $decimales_s[1].'0';
                $monto_s = $decimales_s[0].$decimal_s;
            } else {
                $monto_s = $decimales_s[0].$decimales_s[1];
            }
        } else {
            $monto_s = $monto_s."00";
        }

        $data_num_s[1] = 7;
        $data_num_s[2] = 3;
        $data_num_s[3] = 1;
        $index_s = 1;

        for ($i=strlen($monto_s)-1; $i >=0; $i--) {
            $multi_s = $monto_s[$i]*$data_num_s[$index_s];
            $resultado_s = $resultado_s + $multi_s;
            $index_s++;
            if ($index_s==4) {
                $index_s=1;
            }
        }

        $importe_condensado_s = $resultado_s%10;

        $referencia_integrada_s = $reference.$suma_s.$importe_condensado_s.'2';

        // Digitos verificadores
        $data_n_s[1] = 11;
        $data_n_s[2] = 13;
        $data_n_s[3] = 17;
        $data_n_s[4] = 19;
        $data_n_s[5] = 23;
        $index_s_d = 1;
        $resultado_s_d = 0;
        for ($i=strlen($referencia_integrada_s)-1; $i >=0 ; $i--) {
            $resultado_s_d = $resultado_s_d + ($referencia_integrada_s[$i]*$data_n_s[$index_s_d]);
            $index_s_d++;
            if ($index_s_d==6) {
                $index_s_d=1;
            }
        }
        $digito_verificador_s = ($resultado_s_d%97)+1;
        if (strlen($digito_verificador_s)==1) {
            $digito_verificador_s = '0'.$digito_verificador_s;
        }
        $referencia_s = $referencia_integrada_s.$digito_verificador_s;
        echo "<h1>Santander: ".$referencia_s."</h1>";

        // $print[1] = $referencia;
        // $print[2] = $referencia_s;
        // $print[3] = $date_limit;
        // $print[4] = $amount;

    }
}
