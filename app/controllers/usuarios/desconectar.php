<?php
    session_name('user');
    session_start();

    $_SESSION = array();
    session_destroy();

    header("Location:index.php");
?>