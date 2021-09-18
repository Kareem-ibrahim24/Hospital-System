<?php SESSION_start(); 

if (isset($_GET['logout'])){

  session_unset();
  session_destroy();
  header("Location:/hospital/admin/login.php");
}


?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/hospital/index.php">Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if( isset($_SESSION['admin'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/doctors/add.php">Add Doctor</a>
          <a class="dropdown-item" href="/hospital/doctors/list.php">List  Doctor</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          patients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/patients/add.php">Add patient</a>
          <a class="dropdown-item" href="/hospital/patients/list.php">List  patient</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admins
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/hospital/admin/addadmin.php">Add Admins</a>
        </div>
      </li>
    </ul>
    <form>
    <button name="logout" class="btn btn-outline-primary my-2 my-sm-0" type="submit">logout</button>

    </form>
    <form class="form-inline my-2 my-lg-0">
      <?php else : ?>
      <a href="/hospital/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>

    <?php endif ; ?>  
    </form>
  </div>
</nav>