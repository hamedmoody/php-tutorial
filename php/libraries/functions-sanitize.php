<?php

function en( $string ){
    $western    = ['0','1','2','3','4','5','6','7','8','9'];
    $persian    = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic     = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨','٩'];
    $pr         = str_replace( $persian, $western, $string );
    return str_replace( $arabic, $western, $pr );
}

/**
 * Sanitize Phone Numbers
 * @param $phone
 * @return bool|string
 */
function sanitize_phone( $phone ){

    /**
     * Convert all chars to en digits
     */
    $phone = en( trim( $phone ) );

    //.9158636712   => 09158636712
    if( strpos( $phone, '.' ) === 0 ){
        $phone = '0' . substr( $phone, 1 );
    }

    $phone = str_replace( ['.', ' '], '', $phone );

    //00989185223232 => 9185223232
    if( strpos( $phone, '0098' ) === 0 ){
        $phone = substr( $phone, 4 );
    }
    //0989108210911 => 9108210911
    if( strlen( $phone ) == 13 && strpos( $phone, '098' ) === 0 ){
        $phone = substr( $phone, 3 );
    }
    //+989151234567 => 9151234567
    if( strlen( $phone ) == 13 && strpos( $phone, '+98' ) === 0 ){
        $phone = substr( $phone, 3 );
    }
    //+98 9151234567 => 9151234567
    if( strlen( $phone ) == 14 && strpos( $phone, '+98 ' ) === 0 ){
        $phone = substr( $phone, 4 );
    }
    //989151234567 => 9151234567
    if( strlen( $phone ) == 12 && strpos( $phone, '98' ) === 0 ){
        $phone = substr( $phone, 2 );
    }
    //Prepend 0
    if( strpos( $phone, '0' ) !== 0 ){
        $phone = '0' . $phone;
    }
    /**
     * check for all character was digit
     */
    if( ! ctype_digit( $phone ) ){
        return '';
    }

    if( strlen( $phone ) != 11 ){
        return '';
    }

    return $phone;

}


function sanitize_national_code($code)
{
    if( ! $code ){
        return $code;
    }
    $code = en(str_replace(['-', ' ', '_'] , '' , $code));
    if(!preg_match('/^[0-9]{10}$/',$code))
        return false;
    for($i=0;$i<10;$i++)
        if(preg_match('/^'.$i.'{10}$/',$code))
            return false;
    for($i=0,$sum=0;$i<9;$i++)
        $sum+=((10-$i)*intval(substr($code, $i,1)));
    $ret=$sum%11;
    $parity=intval(substr($code, 9,1));
    if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity))
        return $code;
    return false;
}