<?php
function redirect( $url ){
    header( 'Location: ' . $url );
    exit;
}

function generate_random_string( $length = 6 ){
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $result     = '';
    for( $i = 0; $i < $length; $i++ ){
        $random = rand( 0, strlen( $characters ) - 1 );
        $result .= $characters[$random];
    }
    return $result;
}