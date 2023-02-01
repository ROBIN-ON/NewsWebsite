<?php
    //when the session starts 
    session_start();
    //to logout we have to check if the session has expired
    if(session_destroy()) {
        //one we logout we want to redirect us back to the login page
        header("Location:Adminlogin.php");
    }
?>