<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config.php');





?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <h2>Registerd users</h2>
            <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_product = "SELECT * FROM `addproduct` AS p INNER JOIN `category` AS c ON c.catid = p.pcategory";

                    $result = mysqli_query($connection, $select_product);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr>
                                <td><?php echo $row['pid'] ?></td>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['pdescription'] ?></td>
                                <td><?php echo $row['catname'] ?></td>
                                <td><img src="<?php echo 'uploads/' . $row['image'] ?>" height="50px" width="50px" alt=""></td>
                                <td><?php echo $row['price'] ?></td>

                                <td>
                                    <a href="" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>

    </div>

</div>


</body>

</html>










<?php
include('includes/footer.php');


?>