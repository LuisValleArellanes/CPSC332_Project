<?php
//Variables to connect to the database

$host = "localhost";
$username = "root";
$user_pass = "root";
$database_in_use = "CSUF_Project_CPSC332_alias";

//create a database connection instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
?>