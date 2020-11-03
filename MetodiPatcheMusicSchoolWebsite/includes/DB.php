<?php
 global $conn;
 $conn= mysqli_connect('localhost','root','','musicschool_db');
if(!$conn){
    echo 'Error with connection: '.mysqli_connect_error();
}
session_start();






?>