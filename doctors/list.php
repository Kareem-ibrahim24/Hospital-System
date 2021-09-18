<?php
include '../shared/head.php'  ;
include '../general/db.php' ;
include '../general/function.php' ;
include '../shared/nav.php' ;

$select="SELECT doctors.id,doctors.name doctor,doctors.email,fields.name field FROM `doctors` JOIN fields 	
ON doctors.fieldid=fields.id;";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE from `doctors` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
  header("Location:/hospital/doctors/list.php");
}

auth();
?>
<div class="container col-6">
    <h1 class="display-3 text-center text-primary">List doctors</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Field Id</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($s as $data) { ?>
                <tr> 
                    
                        <th> <?php echo $data['id'] ?> </th>
                        <td> <?php echo $data['doctor'] ?> </td>
                        <td> <?php echo $data['email'] ?> </td>
                        <td> <?php echo $data['field'] ?> </td>
                        <td> <a href="list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete </a> </td>
                        <td> <a href="add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a> </td>

                        <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include '../shared/script.php'  ?>