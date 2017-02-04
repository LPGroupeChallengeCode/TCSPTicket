<?php
session_start();
if(isset($_SESSION['session'])){
    $session = $_SESSION['session'];
}
elseif(isset($_GET['user'])){
    $session = $_GET['user'];
    $_SESSION['session'] = $session;
}
?>