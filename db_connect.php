<?php


$servername="localhost";
$username="root";
$password="";
$database="chatroom";

error_reporting(E_ERROR | E_PARSE);
$conn=mysqli_connect($servername,$username,$password,$database);

if(!conn)
{
    die("failed to connect". mysqli_connect_error());
}


?>