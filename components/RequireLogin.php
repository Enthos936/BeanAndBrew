<?php
    if (session_status() == 1){
        session_start();
    }
#piece of code used to check whether or not the session has already been created
    if($_SESSION["LoggedIn"] == "False"){
        header("Location: ../views/Login.view.php");
    }
#piece  of code that is called for pages where the user would need to be logged in, if logged in it allows access if not redirects to the log in page