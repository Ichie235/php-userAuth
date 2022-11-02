<?php
if(isset($_SESSION['username']))
    session_start();
    session_destroy();
//    echo $_SESSION['username'];
    header("Location: ../forms/register.html");

    
// function logout(){
//     /*
// Check if the existing user has a session
// if it does
// destroy the session and redirect to login page
// */
// }


