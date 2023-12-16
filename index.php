<?php 
include './api.php';
include './config.php';

$sql = "SELECT * FROM games";
$data = $conn->query($sql) or die('cannot getting data.');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - Admin Games</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link href="assets/css/default.css" rel="stylesheet">
  </head>
  <body class="">
    <!-- ======= Header ======= --> <?php include('./components/header.php');?>
    <!-- ======= Sidebar ======= --> <?php include('./components/sidebar.php');?>
    <!-- End Sidebar-->
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="./">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              <!-- Sales Card -->
              <div class="col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Levels</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                      </div>
                      <div class="ps-3">
                        <?php 
                            $sql = "SELECT COUNT(*) as total FROM games";
                            $result = $conn->query($sql) or die('cannot load data.');

                            $row = $result->fetch_assoc();
                            $totalGames = $row['total'];

                            echo '<h6>'.$totalGames.'</h6>';
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Sales Card -->
              <!-- Revenue Card -->
              <div class="col-md-6">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Total images saved</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <?php
                            $directory = "./images/";
                            $fileList = glob($directory . '*');
                            $fileCount = count($fileList);
                            echo "<h6>".$fileCount."</h6>";
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Revenue Card -->
              <!-- Customers Card -->
              <div class="col-xl-12">
              <div class="card-body">
              <h5 class="card-title">Add New Game</h5>

              <!-- Pills Tabs -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Add New</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">Edit Game</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Delete Level</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div aria-labelledby="home-tab" role="tabpanel" id="pills-home" class="tab-pane fade active show"><form method="post" action=" " enctype="multipart/form-data">
                        <input type="hidden" name="method" value="POST">
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="level">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">True Answer</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="answer">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image url</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="file">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" style="height: 100px" name="description"></textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Add Game</button>
                            </div>
                          </div>
                        </form></div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                    


                
                <form method="POST" action=" " enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Level</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected="">Select</option>
                                    <?php 
                                        $sql = "SELECT * FROM games";
                                        $data = $conn->query($sql) or die('cannot load data.');
                                        foreach ($data as $row) {
                                            echo '<option value="'.$row['level'].'">'.$row['level'].'</option>';
                                        }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">True Answer</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="answer">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Image url</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="file">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" style="height: 100px" name="description"></textarea>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-warning">Edit Game</button>
                                </div>
                              </div>
                            </form></div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form method="POST" action=" ">
                            <input type="hidden" name="method" value="DELETE">
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Level</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="level">
                                    <option selected="">Select</option>
                                    <?php 
                                        $sql = "SELECT * FROM games";
                                        $data = $conn->query($sql) or die('cannot load data.');
                                        foreach ($data as $row) {
                                            echo '<option value="'.$row['level'].'">'.$row['level'].'</option>';
                                        }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                              </div>
                            </form></div>
              </div><!-- End Pills Tabs -->

            </div>
              </div>
              <!-- End Customers Card -->
              <!-- Reports -->
              <!-- End Reports -->
              <!-- Recent Sales -->
              <!-- End Recent Sales -->
              <!-- Top Selling -->
              <!-- End Top Selling -->
            </div>
          </div>
          <!-- End Left side columns -->
          <!-- Right side columns -->
          <!-- End Right side columns -->
        </div>
      </section>
    </main>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright"> © Copyright <strong>
          <span>NiceAdmin</span>
        </strong>. All Rights Reserved </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ --> Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <svg id="SvgjsSvg1151" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
      <defs id="SvgjsDefs1152"></defs>
      <polyline id="SvgjsPolyline1153" points="0,0"></polyline>
      <path id="SvgjsPath1154" d="M-1 270.6799995422363L-1 270.6799995422363C-1 270.6799995422363 146.85338049668533 270.6799995422363 146.85338049668533 270.6799995422363C146.85338049668533 270.6799995422363 244.7556341611422 270.6799995422363 244.7556341611422 270.6799995422363C244.7556341611422 270.6799995422363 342.6578878255991 270.6799995422363 342.6578878255991 270.6799995422363C342.6578878255991 270.6799995422363 440.56014149005597 270.6799995422363 440.56014149005597 270.6799995422363C440.56014149005597 270.6799995422363 538.4623951545128 270.6799995422363 538.4623951545128 270.6799995422363C538.4623951545128 270.6799995422363 636.3646488189697 270.6799995422363 636.3646488189697 270.6799995422363C636.3646488189697 270.6799995422363 636.3646488189697 270.6799995422363 636.3646488189697 270.6799995422363C636.3646488189697 270.6799995422363 636.3646488189697 270.6799995422363 636.3646488189697 270.6799995422363 "></path>
    </svg>
  </body>
</html>