<?php
$error = '';
if( isset( $_POST['login'] ) ){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if( strlen( $username ) < 2 || strlen( $password ) < 5 ){
        $error = 'نام کاربری و گذرواژه را درست وارد کنید';
    }else{

        $user       = user_login( $username, $password );
        if( $user ){
            $_SESSION['user'] = $user;
            redirect( 'index.php' );
        }else{
            $error = 'نام کاربری یا گذواژه اشتباه است';
        }

    }
    
}