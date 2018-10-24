<?php
    include_once("../inc/init.php");

    if(isset($_POST['submit'])){
    session_unset();
    session_destroy();
    header("Location: ../index.php?status=LoggedOut");}

