<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "contactus";
$conn = mysqli_connect($server,$user,$password,$db);
if($conn){
echo '';

}else{
    echo 'Not Connected';
}


?>