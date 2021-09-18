<?php
include '../shared/head.php'  ;
include '../general/db.php' ;
include '../general/function.php' ;
include '../shared/nav.php' ;

$select="SELECT patients.id,patients.name patient,patients.email,doctors.name doctor FROM `patients` JOIN doctors 	
ON patients.doctorid=doctors.id;";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE from `patients` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    header("location/hospital/patients/list.php");
}
auth();

?>
<div class="container col-6">
    <h1 class="display-3 text-center text-primary">List patients</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Doctor name</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach ($s as $data) { ?>
                <tr> 
                    
                        <th> <?php echo $data['id'] ?> </th>
                        <td> <?php echo $data['patient'] ?> </td>
                        <td> <?php echo $data['email'] ?> </td>
                        <td> <?php echo $data['doctor'] ?> </td>
                        <td><a href="add.php?update=<?php echo $data['id'] ?>" class="btn btn-info">Update</a> </td>
                        <td><a href="list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a> </td>
                        <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include '../shared/script.php' ?>