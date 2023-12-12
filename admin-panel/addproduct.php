<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config.php');



if (isset($_POST['addcat'])) {
    $catname = $_POST['catname'];

    $insertcat = "INSERT INTO `category` (`catname`) VALUES ('$catname')";
    $result = mysqli_query($connection, $insertcat);
    if($result){
        echo '<script>
        alert("category inserted");
        window.location.href="addproduct.php"
        </script>';
    }
   
}

?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <!-- Add Category -->

        <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Category Name" name="catname" required>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="addcat" value="Add Category">
                </div>

            </div>
        </form>

        <!-- Add Product Program -->
        <div class="col-xl-10 col-lg-12 col-md-9">
            <h2>Add Product</h2>
            <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="category" >
                    <?php 
                    $fetch_cat = "SELECT * from `category`";
                    $res = mysqli_query($connection, $fetch_cat);
                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                        echo '<option value="'.$row['catid'].'">'.$row['catname'].'</option>' ;
                        }
                    }
                    ?>
                            
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" name="pname" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="floatingTextarea2">Description</label>
                    <div class="form-floating">
                    <textarea class="form-control" placeholder="add description" id="floatingTextarea2" style="height: 100px" name="pdes"></textarea>
                    </div>                    
                </div>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control form-control-user" id="exampleInputEmail" name="pimage" required>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" id="exampleInputPassword" placeholder="pprice" name="pprice" required>
                    </div>

                </div>
                <!-- <a class="btn btn-primary btn-user btn-block" name="register">
                Register Account
            </a> -->
                <input type="submit" class="btn btn-primary btn-user btn-block" name="addproduct" value="Add Product">


            </form>

        </div>

    </div>

</div>


<!-- add product PHP -->

<?php 
if(isset($_POST['addproduct'])){
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $pcat = $_POST['category'];
    $price = $_POST['pprice'];
    $pimage_name = $_FILES['pimage']['name'];
    $pimage_tmp_name = $_FILES['pimage']['tmp_name'];

    $insert_product = "INSERT INTO `addproduct` (`pid`, `pname`, `pdescription`, `pcategory`, `price`, `image`) VALUES (NULL, '$pname', '$pdes', '$pcat', '$price', '$pimage_name')";
    $result = mysqli_query($connection, $insert_product);
    move_uploaded_file($pimage_tmp_name, 'uploads/' . $pimage_name);
    if($result){
        echo '<script>
        alert("product inserted");
        </script>';
    }

}


?>

</body>

</html>










<?php
include('includes/footer.php');


?>