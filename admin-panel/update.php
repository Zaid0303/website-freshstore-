<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config.php');
?>
<?php 
if(isset($_GET['id'])){
    $userid = $_GET['id'];

$update = "SELECT * from `users` where `id` = '$userid'";
$res = mysqli_query($connection, $update);
if($res){
    if( mysqli_num_rows($res)> 0){
      

?>



<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">
    <?php 
      $row = mysqli_fetch_assoc($res);
    ?>

    <div class="col-xl-10 col-lg-12 col-md-9">
        <h2>Add users</h2>
        <hr>
<form class="user" action="updatedata.php" method="POST">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="hidden" class="form-control form-control-user" id="exampleFirstName"
                placeholder="First Name" name="userid" required value ="<?php echo $data['id']?>">
            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                placeholder="First Name" name="Fname" required value ="<?php echo $data['fname']?>">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="exampleLastName"
                placeholder="Last Name" name="Lname" required value ="<?php echo $data['lname']?>">
         </div>
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
            placeholder="Email Address" name="email" required value ="<?php echo $data['email']?>">
    </div>

    <!-- <a class="btn btn-primary btn-user btn-block" name="register">
        Register Account
    </a> -->
    <input type="submit" class="btn btn-primary btn-user btn-block" name="update" >
    <hr>
  
                        
</form>
<?php 
    }

} 
}

?>
    </div>

</div>

</div>




<?php
include('includes/footer.php');


?>