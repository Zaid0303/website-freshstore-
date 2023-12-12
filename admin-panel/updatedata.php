<?php 
if(isset($_POST['update'])){
    $userid = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['fname'];
    $email = $_POST['fname'];
}
$update = "UPDATE `users` SET `fname` = '$fname', `lname` = '$lname',`email` = '$email', where `id` = '$userid'" ;
$res = mysqli_query($connection,$update);
if($res){
echo '<script>
alert ("update data successfull")
window.location.href="viewuser.php"
</script>';
};
?>