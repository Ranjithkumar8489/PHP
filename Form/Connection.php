<?php
$hostname = "localhost";
$user = "admin";
$password="admin@321";
$db="trainee";

$con= new mysqli($hostname,$user,$password,$db);

if($con->connect_error){

 die("Connection error:". $con->connect_error);

}

?>