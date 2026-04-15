<?PHP
session_start();

include("database.php");
if( !verifyStaff($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$id_patient	= (isset($_REQUEST['id_patient'])) ? trim($_REQUEST['id_patient']) : '';
$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';
	
$tarikh		= (isset($_POST['tarikh'])) ? trim($_POST['tarikh']) : '';
$lk			= (isset($_POST['lk'])) ? trim($_POST['lk']) : '';
$ab			= (isset($_POST['ab'])) ? trim($_POST['ab']) : '';
$gula		= (isset($_POST['gula'])) ? trim($_POST['gula']) : '';
$hb			= (isset($_POST['hb'])) ? trim($_POST['hb']) : '';
$berat		= (isset($_POST['berat'])) ? trim($_POST['berat']) : '';
$t_darah	= (isset($_POST['t_darah'])) ? trim($_POST['t_darah']) : '';
$ederma		= (isset($_POST['ederma'])) ? trim($_POST['ederma']) : '';
$janin		= (isset($_POST['janin'])) ? trim($_POST['janin']) : '';
$jantung	= (isset($_POST['jantung'])) ? trim($_POST['jantung']) : '';
$jantung	= (isset($_POST['jantung'])) ? trim($_POST['jantung']) : '';
$gerak		= (isset($_POST['gerak'])) ? trim($_POST['gerak']) : '';
$tempoh		= (isset($_POST['tempoh'])) ? trim($_POST['tempoh']) : '';
$tinggi_rahim	= (isset($_POST['tinggi_rahim'])) ? trim($_POST['tinggi_rahim']) : '';
$masalah	= (isset($_POST['masalah'])) ? trim($_POST['masalah']) : '';
$tarikh_temujanji	= (isset($_POST['tarikh_temujanji'])) ? trim($_POST['tarikh_temujanji']) : '';
$pengesahan	= (isset($_POST['pengesahan'])) ? trim($_POST['pengesahan']) : '';

if($act == "add")
{	
	$SQL_update = " 
		INSERT INTO `rekod_kesihatan`(`id_patient`, `tarikh`, `lk`, `ab`, `gula`, `hb`, `berat`, `t_darah`, `ederma`, `janin`, `jantung`, `gerak`, `tempoh`, `tinggi_rahim`, `masalah`, `tarikh_temujanji`, `pengesahan`) 
		VALUES ('$id_patient', '$tarikh', '$lk', '$ab', '$gula', '$hb', '$berat', '$t_darah', '$ederma', '$janin', '$jantung', '$gerak', '$tempoh', '$tinggi_rahim', '$masalah', '$tarikh_temujanji', '$pengesahan')
	";	

	$result = mysqli_query($con, $SQL_update) or die("Error in query: ".$SQL_update."<br />".mysqli_error($con));
	
	print "<script>alert('Kemaskini daftar');self.location='main5.php?id_patient=" . $id_patient . "';</script>";
}


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

  <title>Rekod Kesihatan Terkini</title>
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

                    <a href="main1.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action" >Maklumat Ibu</a>
                    <a href="main2.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Perihal Kandungan Lalu</a>
                    <a href="main3.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="main4.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action" >Kandungan Sekarang</a>
                    <a href="main5.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action active" aria-current="true">Pemeriksaan Kandungan Sekarang</a>
                    <a href="main6.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Perihal Kelahiran Bayi</a>
					<a href="main7.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Kata Laluan</a>
					
                  </div><!-- End List group with Links and buttons -->
                  <br>
                  <div class="text-center">
                    <a href="main.php" class="btn btn-primary"><i class="bx bx-home"></i>  Home</a>
					<a href="logout.php" class="btn btn-danger">Log Out</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
			<form method="post" action="" class="">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Rekod Kesihatan Terkini</h5>
        
                      <!-- Multi Columns Form -->
                      <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputdate1" class="form-label">Tarikh *</label>
                            <input type="date" class="form-control" name="tarikh" required>
                        </div>
                        <div class="col-md-6">
                          <label for="inputLK" class="form-label">LK/LR</label>
                          <input type="text" class="form-control" name="lk">
                        </div>
                      </div><!-- End Multi Columns Form -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Ujian</h5>
        
                      <!-- Multi Columns Form -->
                      <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputalb" class="form-label">A|b</label>
                            <input type="text" class="form-control" name="ab">
                        </div>
                        <div class="col-md-6">
                            <label for="inputgula" class="form-label">Gula</label>
                            <input type="text" class="form-control" name="gula">
                        </div>
                        <div class="col-md-6">
                          <label for="inputhb" class="form-label">Hb (gm%)</label>
                          <input type="text" class="form-control" name="hb">
                        </div>
                      </div><!-- End Multi Columns Form -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Pemeriksaan</h5>
        
                      <!-- Multi Columns Form -->
                      <div class="row g-3">
                        <div class="col-md-4">
                            <label for="inputweight" class="form-label">Berat Badan (kg)*</label>
                            <input type="text" class="form-control" name="berat" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputpressure" class="form-label">Tekanan Darah</label>
                            <input type="text" class="form-control" name="t_darah">
                        </div>
                        <div class="col-md-4">
                            <label for="inputederma" class="form-label">Ederma</label>
                            <input type="text" class="form-control" name="ederma">
                        </div>
                        <div class="col-md-4">
                            <label for="inputplace" class="form-label">Kedudukan Janin</label>
                            <input type="text" class="form-control" name="janin">
                        </div>
                        <div class="col-md-4">
                            <label for="inputheart" class="form-label">Jantung (Janin)</label>
                            <input type="text" class="form-control" name="jantung">
                        </div>
                        <div class="col-md-4">
                            <label for="inputmove" class="form-label">Gerak (Janin)</label>
                            <input type="text" class="form-control" name="gerak">
                        </div>
                        <div class="col-md-6">
                            <label for="inputtime1" class="form-label">Tempoh Hamil</label>
                            <input type="text" class="form-control" name="tempoh">
                        </div>
                        <div class="col-md-6">
                            <label for="inputheight1" class="form-label">Tinggi Rahim</label>
                            <input type="text" class="form-control" name="tinggi_rahim">
                        </div>
                        <div class="col-md-12">
                            <label for="inputprob" class="form-label">Masalah dan Pengendalian</label>
                            <textarea class="form-control" name="masalah">
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="inputdate2" class="form-label">Tarikh Temujanji</label>
                            <div class="col-md-12">
                              <input type="date" class="form-control" name="tarikh_temujanji" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputverify" class="form-label">Pengesahan Doktor</label>
                            <textarea class="form-control" name="pengesahan"></textarea>
                        </div>
                      </div><!-- End Multi Columns Form -->

                      <br>

                      

                    </div>
                </div>
				
					<div class="text-center">
					  <input type="hidden" name="act" value="add" >
					  <button type="submit" class="btn btn-primary">Submit</button>
					</div>
            </form>
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