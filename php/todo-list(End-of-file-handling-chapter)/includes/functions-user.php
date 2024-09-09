<?php
function user_login( $username, $password ){
    $users = include( 'simple-login-form-users.php' );
    foreach( $users as $user ){
        if( $user['username'] == $username && $user['password'] == $password ){
            return $user;
        }
    }
    return false;
}

function user_logout(){
    if( is_login() ){
        unset( $_SESSION['user'] );
    }
    return true;
}

function is_login(){
    return isset( $_SESSION['user'] ) ;
}

function get_user(){
    return $_SESSION['user'];
}