<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    //set a cookie for the user name

    // setcookie 4 parameters

    // variable it will contain
    //time
    //available for one page or all pages of the web

    setcookie('username' ,$username, time()+60,"/");


   // header( header: "")



}