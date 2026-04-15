<?PHP
session_start();

include("database.php");
if( !verifyPatient($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$SQL_view 	= " SELECT * FROM `patient` WHERE `nric` =  '".$_SESSION['nric']."' ";
$result 	= mysqli_query($con, $SQL_view) or die("Error in query: ".$SQL_view."<br />".mysqli_error($con));
$data		= mysqli_fetch_array($result);
$name		= $data["name"];
$nric		= $data["nric"];
$id_patient	= $data["id_patient"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perihal Kandungan Lalu</title>
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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-cente justify-content-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">REKOD KESIHATAN IBU</span>
      </a>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <main id="main" class="main">

    <section class="section">
		<div class="row">
			<div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            
                          <?PHP echo $name;?>
                          <h4><?PHP echo $nric;?></h4>
                        </div>
    
                  <!-- List group with Links and buttons -->
                  <div class="list-group">
                    <a href="a-main1.php" class="list-group-item list-group-item-action">Maklumat Ibu</a>
                    <a href="a-main2.php" class="list-group-item list-group-item-action active" aria-current="true" >Perihal Kandungan Lalu</a>
                    <a href="a-main3.php" class="list-group-item list-group-item-action">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="a-main4.php" class="list-group-item list-group-item-action">Kandungan Sekarang</a>
                    <a href="a-main5.php" class="list-group-item list-group-item-action">Pemeriksaan Kandungan Sekarang</a>
                    <a href="a-main6.php" class="list-group-item list-group-item-action">Perihal Kelahiran Bayi</a>
					<a href="a-main7.php" class="list-group-item list-group-item-action">Kata Laluan</a>

                  </div><!-- End List group with Links and buttons -->
                  <br>
                  <div class="text-center">
                    <a href="logout.php" class="btn btn-primary">Log Out</a>
                  </div>
                </div>

               

              </div>
            </div>
	  
	  <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Perihal Kandungan Lalu</h5>

            <br><br>

            <div class="table-responsive">
			<!-- Table with stripped rows -->
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">Bil</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">Hasil Kandungan</th>
                  <th scope="col">Jenis Kelahiran</th>
                  <th scope="col">Tempat dan Disambut Oleh</th>
                  <th scope="col">Jantina</th>
                  <th scope="col">Berat Lahir (kg)</th>
                  <th scope="col">Komplikasi Ibu</th>
                  <th scope="col">Komplikasi Anak</th>
                  <th scope="col">Penyusuan Susu Ibu/Tempoh</th>
                  <th scope="col">Keadaan Anak Sekarang</th>
                </tr>
              </thead>
              <tbody>
			  <?PHP
				$bil = 0;
				$SQL_patient = "SELECT * FROM `kandungan_lalu` WHERE `id_patient` =  $id_patient" ;
				$result = mysqli_query($con, $SQL_patient) or die("Error in query: ".$SQL_patient."<br />".mysqli_error($con));
				while ( $data	= mysqli_fetch_array($result) )
				{
					$bil++; 
				?>
                <tr>
                    <th scope="row"><?PHP echo $bil;?></th>
                    <td><?PHP echo $data["tahun"]; ?></td>
                    <td><?PHP echo $data["hasil"]; ?></td>
                    <td><?PHP echo $data["jenis"]; ?></td>
                    <td><?PHP echo $data["tempat"]; ?></td>
                    <td><?PHP echo $data["jantina"]; ?></td>
                    <td><?PHP echo $data["berat"]; ?></td>
                    <td><?PHP echo $data["komplikasi_ibu"]; ?></td>
                    <td><?PHP echo $data["komplikasi_anak"]; ?></td>
                    <td><?PHP echo $data["susuan"]; ?></td>
                    <td><?PHP echo $data["keadaan"]; ?></td>
                </tr>
				<?PHP } ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
			</div>

            
          </div>
        </div>
      </div> 
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-auto">
    <div class="credits">
      Designed by E-Maternity</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>