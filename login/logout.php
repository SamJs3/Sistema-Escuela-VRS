<?php

include ('../app/config.php');

session_start();

if(isset($_SESSION['email recibido'])){
    session_destroy();
    header('Location: '.APP_URL.'/login');
}