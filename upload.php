<?php 
include './session.php';
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
  <h1>Image Uploader</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Image Uploader</li>
      
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Choose Your Image</h5>

          <!-- General Form Elements -->
          <form action=" " method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="uploaded_file" accept="image/png, image/gif, image/jpeg"/>
                </div>     
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button class="btn btn-primary" type="submit" value="Upload">Upload File</button>
              </div>
            </div>

          </form>
          <!-- End General Form Elements -->

          <?php
            if (!empty($_FILES['uploaded_file'])) {
                $allowedExtensions = array('jpg', 'jpeg', 'png');
                $path = "images/";
                $file_name = $_FILES['uploaded_file']['name'];
                $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                if (in_array($file_extension, $allowedExtensions)) {
                    $timestamp = time();
                    $date = date('Ymd');
                    $hashed_name = hash('sha256', $timestamp . $date);

                    $new_file_name = $hashed_name . '.' . $file_extension;
                    $path = $path . $new_file_name;

                    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                        echo '<div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Copy url</label>
                            <div class="col-sm-10">';
                        echo "<div class='input-group mb-3'> <input type='text' class='form-control' aria-describedby='basic-addon2' value='" . $_SERVER['HTTP_HOST'] . '/images/' . $new_file_name . "' id='image-url'> <span class='input-group-text' id='basic-addon2'><button class='btn btn-primary' onclick='copyImageUrl()'>Copy</button></span></div>";
                        echo '</div>
                            </div>';
                    } else {
                        echo "There was an error uploading the file, please try again!";
                    }
                } else {
                    echo "Invalid file extension. Only .jpg, .jpeg, and .png are allowed.";
                }
            }
          ?>


        </div>
      </div>

    </div>

    
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

    <script>
        function copyImageUrl() {
            var imageUrlInput = document.getElementById('image-url');

            imageUrlInput.select();
            imageUrlInput.setSelectionRange(0, 99999); 

            document.execCommand('copy');
        }
    </script>
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