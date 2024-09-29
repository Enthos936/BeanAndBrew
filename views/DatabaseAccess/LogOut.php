<?php
    session_start();

    $_SESSION["LoggedIn"] = "False";
    
    header("Location: ../Home.view.php");