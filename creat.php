<?php 

$server     = "localhost";
$dbName     = "form";
$dbUser     = "root";
$dbPassword = "";

   # Create Connection ... 
   $con =   mysqli_connect($server,$dbUser,$dbPassword,$dbName);

   if(!$con){

       die('Error '.mysqli_connect_error());
   }


?>