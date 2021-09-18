<?php 

function test ($con){

if($con){
    echo "every thing ok";
}
else{
    echo "every thing false";
}
}

function auth(){
    if($_SESSION['admin']){

    }else{
         header("Location:/hospital/admin/login.php");
    }
}
?>