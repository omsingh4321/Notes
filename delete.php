<?php
include "./db.php";
$id=$_GET["id"];

$sql="delete from data_notes where serial=$id";
$res=mysqli_query($conn,$sql);

header("location:./index.php");


?>