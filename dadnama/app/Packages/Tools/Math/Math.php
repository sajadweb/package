<?php

/**
 * @param $value
 * @param string $to [a it is Auth G it is Gig ,m,k,... ]
 * @return float|int
 */
function SmRound($value, $to = 'a')
{
//    $value=9542347;
    if ($to == 'a') {
        if (($value / 1000) < 1) {
            $to = 'd';
        } elseif (($value / 10000) < 1) {
            $to = 'K';
        } elseif (($value / 100000) < 1) {
            $to = 'M';
        } elseif (($value / 1000000) < 1) {
            $to = 'G';
        } elseif (($value / 10000000) < 1) {
            $to = 'N';
        }
    }
//    $to='a';
//dd([$value/10000<0,$to]);
    switch ($to) {
        case 'N': {
            return round($value / 1000000,3) . ' N';
            break;
        }
        case 'G': {
            return round($value / 100000,2) . ' G';
            break;
        }
        case 'M': {
            return round($value / 10000,2) . ' M';
            break;
        }
        case 'K': {
            return round($value / 1000,1) . ' K';
            break;
        }
        default:
            return $value;
    }
}

/**
 * @param $name
 * @param string $value
 * @param string $attr
 * @return string html
 */
function hidden($name ,$value='',$attr=''){
    return "<input type='hidden' hidden value='$value'  name='$name' class='hidden' $attr>";
}


function yesterday(){

    return strtotime("-1 days");
}
function getTockens(){

    return "helos";
}