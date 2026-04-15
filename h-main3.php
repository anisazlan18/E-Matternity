<?PHP
session_start();

include("database.php");
if( !verifyHospital($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$id_patient	= (isset($_REQUEST['id_patient'])) ? trim($_REQUEST['id_patient']) : '';

$SQL_view 	= " SELECT * FROM `patient` WHERE `id_patient` =  '$id_patient' ";
$result 	= mysqli_query($con, $SQL_view) or die("Error in query: ".$SQL_view."<br />".mysqli_error($con));
$data		= mysqli_fetch_array($result);
$name		= $data["name"];
$nric		= $data["nric"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riwayat Kesihatan Ibu/Keluarga</title>
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
                    <a href="h-main1.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Maklumat Ibu</a>
                    <a href="h-main2.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Perihal Kandungan Lalu</a>
                    <a href="h-main3.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action active" aria-current="true">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="h-main4.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Kandungan Sekarang</a>
                    <a href="h-main5.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Pemeriksaan Kandungan Sekarang</a>
                    <a href="h-main6.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Perihal Kelahiran Bayi</a>

                  </div><!-- End List group with Links and buttons -->
                  <br>
                  <div class="text-center">
                    <a href="h-main.php" class="btn btn-primary"><i class="bx bx-home"></i>  Home</a>
					<a href="logout.php" class="btn btn-danger">Log Out</a>
                  </div>
                </div>

               

              </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Masalah Perubatan Ibu</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="diabetes" name="diabetes" value="1" <?PHP if($data["diabetes"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="diabetes">Diabetes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="daraht" name="daraht" value="1" <?PHP if($data["daraht"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="daraht">Darah Tinggi</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="alergi" name="alergi" value="1" <?PHP if($data["alergi"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="alergi">Alergi</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="asthma" name="asthma" value="1" <?PHP if($data["asthma"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="asthma">Asthma</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sjantung" name="sjantung" value="1" <?PHP if($data["sjantung"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="sjantung">Sakit Jantung</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tibi" name="tibi" value="1" <?PHP if($data["tibi"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="tibi">Tibi</label>
                            </div>
                            <br>
                            <div class="col-md-14">
                                <label for="lain" class="form-label">Lain-lain (Nyatakan)</label>
                                <input type="text" class="form-control" id="lain" name="lain" value="<?PHP echo $data["lain"]; ?>" disabled>
                            </div>

                        </div>
                      </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Masalah Perubatan Keluarga</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="diabetes2" name="diabetes2" value="1" <?PHP if($data["diabetes2"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="diabetes2">Diabetes</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="daraht2" name="daraht2" value="1" <?PHP if($data["daraht2"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="daraht2">Darah Tinggi</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="alergi2" name="alergi2" value="1" <?PHP if($data["alergi2"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="alergi2">Alergi</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="asthma2" name="asthma2" value="1" <?PHP if($data["asthma2"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="asthma2">Asthma</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sjantung2" name="sjantung2" value="1" <?PHP if($data["sjantung2"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="sjantung2">Sakit Jantung</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tibi2" name="tibi2" value="1" <?PHP if($data["tibi2"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="tibi2">Tibi</label>
                            </div>
                            <br>
                            <div class="col-md-14">
                                <label for="lain2" class="form-label">Lain-lain (Nyatakan)</label>
                                <input type="text" class="form-control" id="lain2" name="lain2" value="<?PHP echo $data["lain2"];?>" disabled>
                            </div>


						</div>
					 </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Imunisasi Ibu</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-sm-10">
                            <div class="col-md-14">
                                <label for="rubella" class="form-label">Rubella Tarikh</label>
                                <div class="col-md-12">
                                <input type="date" class="form-control" name="rubella" value="<?PHP echo $data["rubella"];?>" disabled>
								</div>
                            </div>
                            <br>
                            <div class="col-md-14">
                                <label for="tetanus" class="form-label">Tetanus Toxoid Dos 1 Tarikh</label>
                                <div class="col-md-12">
                                <input type="date" class="form-control" name="tetanus" value="<?PHP echo $data["tetanus"];?>" disabled>
								</div>
                            </div>
                            <br>
                            <div class="col-md-14">
                                <label for="dos2" class="form-label">Dos 2 Tarikh</label>
                                <div class="col-md-12">
                                <input type="date" class="form-control" name="dos2" value="<?PHP echo $data["dos2"];?>" disabled>
								</div>
                            </div>
                            <br>
                            <div class="col-md-14">
                                <label for="dostambahan" class="form-label">Dos Tambahan Tarikh</label>
                                <div class="col-md-12">
                                <input type="date" class="form-control" name="dostambahan" value="<?PHP echo $data["dostambahan"];?>" disabled>
								</div>
                            </div>

                        </div>
                      </form><!-- End Multi Columns Form -->

                            
                    </div>
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