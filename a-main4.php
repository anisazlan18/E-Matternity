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
$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';
	
$height		= (isset($_POST['height'])) ? trim($_POST['height']) : '';
$tiroid		= (isset($_POST['tiroid'])) ? trim($_POST['tiroid']) : '';
$jaundis 	= (isset($_POST['jaundis'])) ? trim($_POST['jaundis']) : '';
$vena		= (isset($_POST['vena'])) ? trim($_POST['vena']) : '';
$payu		= (isset($_POST['payu'])) ? trim($_POST['payu']) : '';
$kardio		= (isset($_POST['kardio'])) ? trim($_POST['kardio']) : '';
$nafas		= (isset($_POST['nafas'])) ? trim($_POST['nafas']) : '';
$abdomen	= (isset($_POST['abdomen'])) ? trim($_POST['abdomen']) : '';
$lain3		= (isset($_POST['lain3'])) ? trim($_POST['lain3']) : '';
$gigi		= (isset($_POST['gigi'])) ? trim($_POST['gigi']) : '';

$lain3		=	mysqli_real_escape_string($con, $lain3);

if($act == "edit")
{	
	$SQL_update = " 
		UPDATE
			`patient`
		SET
			`height` = '$height',
			`tiroid` = '$tiroid',
			`jaundis` = '$jaundis',
			`vena` = '$vena',
			`payu` = '$payu',
			`kardio` = '$kardio',
			`nafas` = '$nafas',
			`abdomen` = '$abdomen',
			`lain3` = '$lain3',
			`gigi` = '$gigi'
		WHERE
			`nric` = '" . $_SESSION["nric"] . "' 
	";	

	$result = mysqli_query($con, $SQL_update) or die("Error in query: ".$SQL_update."<br />".mysqli_error($con));
	
	
	print "<script>alert('Kemaskini berjaya');</script>";
}


$SQL_view 	= " SELECT * FROM `patient` WHERE `nric` =  '".$_SESSION['nric']."' ";
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

  <title>Kandungan Sekarang</title>
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
                    <a href="a-main1.php" class="list-group-item list-group-item-action" >Maklumat Ibu</a>
                    <a href="a-main2.php" class="list-group-item list-group-item-action">Perihal Kandungan Lalu</a>
                    <a href="a-main3.php" class="list-group-item list-group-item-action">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="a-main4.php" class="list-group-item list-group-item-action active" aria-current="true">Kandungan Sekarang</a>
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

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Kandungan Sekarang - Perihal Pemeriksaan Ibu</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-md-6">
                          <label for="height" class="form-label">Ukuran Tinggi (cm)</label>
                          <input type="text" class="form-control" name="height" value="<?PHP echo $data["height"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                          <label for="tiroid" class="form-label">Tiroid</label>
                          <input type="text" class="form-control" name="tiroid" value="<?PHP echo $data["tiroid"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="jaundis" class="form-label">Jaundis</label>
                            <input type="text" class="form-control" name="jaundis" value="<?PHP echo $data["jaundis"]; ?>" disabled>
                          </div>
                        <div class="col-md-6">
                          <label for="vena" class="form-label">Vena Varikos</label>
                          <input type="text" class="form-control" name="vena" value="<?PHP echo $data["vena"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                          <label for="payu" class="form-label">Payudara</label>
                          <input type="text" class="form-control" name="payu" value="<?PHP echo $data["payu"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="kardio" class="form-label">Sistem Kardiovaskular</label>
                            <input type="text" class="form-control" name="kardio" value="<?PHP echo $data["kardio"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="nafas" class="form-label">Sistem Pernafasan</label>
                            <input type="text" class="form-control" name="nafas" value="<?PHP echo $data["nafas"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="abdomen" class="form-label">Abdomen</label>
                            <input type="text" class="form-control" name="abdomen" value="<?PHP echo $data["abdomen"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="lain3" class="form-label">Lain-lain (Nyatakan)</label>
                            <input type="text" class="form-control" name="lain3" value="<?PHP echo $data["lain3"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="gigi" class="form-label">Gigi</label>
                            <input type="text" class="form-control" name="gigi" value="<?PHP echo $data["gigi"]; ?>" disabled>
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