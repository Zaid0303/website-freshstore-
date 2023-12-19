<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('../config.php');
?>







<!-- main -->
<main class="main-content-wrapper">
  <div class="container">
    <!-- row -->
    <div class="row mb-8">
      <div class="col-md-12">
        <div class="d-md-flex justify-content-between align-items-center">
          <!-- pageheader -->
          <div>
            <h2>Categories</h2>
            <!-- breacrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
              </ol>
            </nav>
          </div>
          <!-- button -->
          <div>
            <a href="add-category.php" class="btn btn-primary">Add New Category</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-xl-12 col-12 mb-5">
        <!-- card -->
        <div class="card h-100 card-lg">
          <div class=" px-6 py-6 ">
            <div class="row justify-content-between">

              <!-- select option -->
              <div class="col-xl-2 col-md-4 col-12">
                <select class="form-select">
                  <option selected>Status</option>
                  <option value="Published">Published</option>
                  <option value="Unpublished">Unpublished</option>
                </select>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-body p-0">
            <!-- table -->
            <div class="table-responsive ">
              <table id="tab" class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                <thead class="bg-light">
                  <tr>

                    <th> Name</th>
                    <th>Proudct</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $fetch_category = "select * from category";
                  $result = mysqli_query($connection, $fetch_category);
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <tr>
                        <td><a href="#" class="text-reset"><?php echo $row['catname'] ?></a></td>
                        <td>12</td>
                        <td>
                          <?php
                          if ($row['catstatus'] == 1) {
                            echo '<span class="badge bg-light-primary text-dark-primary">Published</span>';
                          } else {
                            echo '<span class="badge bg-light-danger text-dark-danger">UnPublished</span>';
                          }
                          ?>
                        </td>
                        <td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="feather-icon icon-more-vertical fs-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                  <?php

                    }
                  }
                  ?>

                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>
</div>


<?php
include('includes/footer.php');

?>