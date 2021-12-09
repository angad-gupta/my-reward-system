<?php

function number_to_words($no){
    if($no == 0) {
        return ' ';

    }else {
        $n =  strlen($no); // 7
        switch ($n) {
            case 3:
                $val = $no/100;
                $val = round($val, 2);
                $finalval =  $val ." Hundred";
                break;
            case 4:
                $val = $no/1000;
                $val = round($val, 2);
                $finalval =  $val ." K";
                break;
            case 5:
                $val = $no/1000;
                $val = round($val, 2);
                $finalval =  $val ." K";
                break;
            case 6:
                $val = $no/100000;
                $val = round($val, 2);
                $finalval =  $val ." Lakh";
                break;
            case 7:
                $val = $no/100000;
                $val = round($val, 2);
                $finalval =  $val ." Lakh";
                break;
            case 8:
                $val = $no/10000000;
                $val = round($val, 2);
                $finalval =  $val ." Crore";
                break;
            case 9:
                $val = $no/10000000;
                $val = round($val, 2);
                $finalval =  $val ." Crore";
                break;

            default:
                echo "";
        }
        return $finalval;

    }
}