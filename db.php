<?php
$server="localhost";
$user="root";
$password="";
$database="notes";
$conn=mysqli_connect($server,$user,$password,$database);
if(!$conn)
echo "Connection not established";

?>