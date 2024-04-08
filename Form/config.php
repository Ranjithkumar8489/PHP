<?php
$servername="localhost";
$username="ranjith";
$password="877";
$dbname="ranjith";

$con =mysqli_connect($servername, $username, $password, $dbname);

if(!$con){
    die("connection failed: ". mysqli_connect_error());
}

?>