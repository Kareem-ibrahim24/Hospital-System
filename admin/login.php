<?php
 include '../shared/head.php' ; 
include '../shared/nav.php' ;
include '../general/db.php' ;
include '../general/function.php' ;


if (isset($_POST['login'])){

    $email=$_POST['email'];
    $pass=$_POST['password'];
    $select="SELECT * from `admin` where email='$email' and password='$pass'";
    $s=mysqli_query($conn,$select);
    $numrow=mysqli_num_rows($s);
    if($numrow >0){
        echo "true admin";
        $_SESSION['admin']=$email;
        header("location:/hospital/index.php");
    }
    else{
        echo "false admin";
    }
}


?>



<div class="container col-6">
    <h1 class="display-3 text-center text-primary">Login Page</h1>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label>User Email</label>
                    <input type="text" name="email" class="form-control"> 
                </div>
                <div class="form-group">
                    <label>User password</label>
                    <input type="text" name="password" class="form-control"> 
                </div>
                <button class="btn btn-info" name="login">Login</button>
            </form>
        </div>
    </div>  
</div>






<?php include '../shared/script.php'  ?>