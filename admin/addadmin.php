<?php
 include '../shared/head.php' ; 
include '../shared/nav.php' ;
include '../general/db.php' ;
include '../general/function.php' ;


if (isset($_POST['signup'])){

    $email=$_POST['email'];
    $pass=$_POST['password'];
    $insert="INSERT into `admin` values (null , '$email', '$pass')";
    $s=mysqli_query($conn,$insert);
    header("location:/hospital/index.php");
  
}
auth();

if($_SESSION['admin']== '01093239919'){


?>



<div class="container col-6">
    <h1 class="display-3 text-center text-primary">Sign Page</h1>
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
                <button class="btn btn-info" name="signup">sign up</button>
            </form>
        </div>
    </div>  
</div>


<?php
}
else{
    echo "false enter";
}
?>



<?php include '../shared/script.php'  ?>