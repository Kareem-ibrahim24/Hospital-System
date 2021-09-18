<?php
 include '../shared/head.php' ; 
include '../shared/nav.php' ;
include '../general/db.php' ;
include '../general/function.php' ;

if (isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $fieldid = $_POST['fieldid'];
    $insert="INSERT into `doctors` values (null,' $name','$email',$fieldid)";
    $i=mysqli_query($conn,$insert);
   header("Location:/hospital/doctors/list.php");

}
$select="SELECT * FROM `fields`";
$s=mysqli_query($conn,$select);

$name="";
$email="";
$update=false;
if(isset($_GET['edit'])){
    $update=true;
    $id=$_GET['edit'];
    $select="SELECT * from `doctors` where id =$id";
    $ss=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($ss);
    $name=$row['name'];
    $email=$row['email'];

    if (isset($_POST['update'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $fieldid = $_POST['fieldid'];
        $update="UPDATE `doctors` set name= '$name' ,email= '$email' , fieldid= $fieldid";
        $u=mysqli_query($conn,$update);
        header("Location:/hospital/doctors/list.php");
    
    }

}

auth();

?>


<div class="container col-6">
    <?php if ($update):?>
    <h1 class="display-3 text-center text-primary">update doctors</h1>
    <?php else:?>
    <h1 class="display-3 text-center text-primary">ADD doctors</h1>
        <?php endif;?>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label>Doctor Name</label>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control" placeholder=" Name">
                </div>
                <div class="form-group">
                    <label>Doctor E-mail</label>
                    <input type="text" value="<?php echo $email ?>" name="email" class="form-control" placeholder=" Email" >
                </div>
                <div class="form-group">
                    <label>Field Id</label>
                    <select name="fieldid"  class="form-control">
                    <?php foreach($s as $data){ ?>
                   
                        <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?>   </option>
                        <?php }?>
                    </select>
                </div>
                <?php if($update) :?>
                <button name="update" class="btn btn-primary">update Data</button>
                    <?php else :?>
                <button name="send" class="btn btn-info">Send Data</button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div> 



<?php include '../shared/script.php'  ?>