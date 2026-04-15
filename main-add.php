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

$nric		= (isset($_POST['nric'])) ? trim($_POST['nric']) : '';	
$name		= (isset($_POST['name'])) ? trim($_POST['name']) : '';
$job		= (isset($_POST['job'])) ? trim($_POST['job']) : '';
$name 		= (isset($_POST['name'])) ? trim($_POST['name']) : '';
$tha		= (isset($_POST['tha'])) ? trim($_POST['tha']) : '';
$address	= (isset($_POST['address'])) ? trim($_POST['address']) : '';
$risk		= (isset($_POST['risk'])) ? trim($_POST['risk']) : '';
$tal		= (isset($_POST['tal'])) ? trim($_POST['tal']) : '';
$phone		= (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
$gr			= (isset($_POST['gr'])) ? trim($_POST['gr']) : '';
$p			= (isset($_POST['p'])) ? trim($_POST['p']) : '';
$plus		= (isset($_POST['plus'])) ? trim($_POST['plus']) : '';
$husband	= (isset($_POST['husband'])) ? trim($_POST['husband']) : '';
$dob		= (isset($_POST['dob'])) ? trim($_POST['dob']) : '';
$age		= (isset($_POST['age'])) ? trim($_POST['age']) : '';
$nric_husb	= (isset($_POST['nric_husb'])) ? trim($_POST['nric_husb']) : '';
$etnik		= (isset($_POST['etnik'])) ? trim($_POST['etnik']) : '';
$husbwork	= (isset($_POST['husbwork'])) ? trim($_POST['husbwork']) : '';
$warga		= (isset($_POST['warga'])) ? trim($_POST['warga']) : '';
$phone2		= (isset($_POST['phone2'])) ? trim($_POST['phone2']) : '';
$phone3		= (isset($_POST['phone3'])) ? trim($_POST['phone3']) : '';

$password	= $nric;

$diabetes= '0';
$daraht= '0';
$alergi= '0';
$asthma= '0';
$sjantung= '0';
$tibi= '0';
$lain= '';
$diabetes2= '0';
$daraht2= '0';
$alergi2= '0';
$asthma2= '0';
$sjantung2= '0';
$tibi2= '0';
$lain2= '';
$rubella= '';
$tetanus= '';
$dos2= '';
$dostambahan= '0';
$height= '0';
$tiroid= '0';
$jaundis= '0';
$vena= '0';
$payu= '0';
$kardio= '0';
$nafas= '0';
$abdomen= '0';
$lain3= '';
$gigi= '0';
$bbirth= '0';
$bgender= '0';
$bplacebirth= '0';
$bweight= '0';
$bsambut= '0';
$uri= '0';
$sintometrin= '0';
$ergometrin= '0';
$lahir_spontan= '0';
$lahir_alat= '';
$indication= '';
$lahir_caesarean= '';
$indication2= '';
$pph= '0';
$perineum= '0';
$lain4= '';
$lahir_hidup= '0';
$apgar= '';
$abnormaliti= '0';
$abn_nyata='';

$name		=	mysqli_real_escape_string($con, $name);
$address	=	mysqli_real_escape_string($con, $address);

if($act == "add")
{	
	$SQL_insert = " 
		INSERT INTO `patient`(`nric`, `name`, `job`, `tha`, `address`, `risk`, `tal`, `phone`, `gr`, `p`, `plus`, `husband`, `dob`, `age`, `nric_husb`, `etnik`, `husbwork`, `warga`, `phone2`, `phone3`, `password`, `diabetes`, `daraht`, `alergi`, `asthma`, `sjantung`, `tibi`, `lain`, `diabetes2`, `daraht2`, `alergi2`, `asthma2`, `sjantung2`, `tibi2`, `lain2`,  `height`, `tiroid`, `jaundis`, `vena`, `payu`, `kardio`, `nafas`, `abdomen`, `lain3`, `gigi`, `bbirth`, `bgender`, `bplacebirth`, `bweight`, `bsambut`, `uri`, `sintometrin`, `ergometrin`, `lahir_spontan`, `lahir_alat`, `indication`, `lahir_caesarean`, `indication2`, `pph`, `perineum`, `lain4`, `lahir_hidup`, `apgar`, `abnormaliti`, `abn_nyata`) 
		VALUES ('$nric', '$name', '$job', '$tha', '$address', '$risk', '$tal', '$phone', '$gr', '$p', '$plus', '$husband', '$dob', '$age', '$nric_husb', '$etnik', '$husbwork', '$warga', '$phone2', '$phone3', '$password', '$diabetes', '$daraht', '$alergi', '$asthma', '$sjantung', '$tibi', '$lain', '$diabetes2', '$daraht2', '$alergi2', '$asthma2', '$sjantung2', '$tibi2', '$lain2',  '$height', '$tiroid', '$jaundis', '$vena', '$payu', '$kardio', '$nafas', '$abdomen', '$lain3', '$gigi', '$bbirth', '$bgender', '$bplacebirth', '$bweight', '$bsambut', '$uri', '$sintometrin', '$ergometrin', '$lahir_spontan', '$lahir_alat', '$indication', '$lahir_caesarean', '$indication2', '$pph', '$perineum', '$lain4', '$lahir_hidup', '$apgar', '$abnormaliti', '$abn_nyata') 
	";	

	$result = mysqli_query($con, $SQL_insert) or die("Error in query: ".$SQL_insert."<br />".mysqli_error($con));
	
	$id_patient = mysqli_insert_id($con);
	
	print "<script>alert('Berjaya Daftar');self.location='main1.php?id_patient=" . $id_patient . "';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Maklumat Ibu</title>
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
            
                          <h2>Daftar Baharu</h2>
                        </div>
    
                  <!-- List group with Links and buttons -->
                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Maklumat Ibu</a>
                    <a href="#" class="list-group-item list-group-item-action">Perihal Kandungan Lalu</a>
                    <a href="#" class="list-group-item list-group-item-action">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="#" class="list-group-item list-group-item-action">Kandungan Sekarang</a>
                    <a href="#" class="list-group-item list-group-item-action">Pemeriksaan Kandungan Sekarang</a>
                    <a href="#" class="list-group-item list-group-item-action">Perihal Kelahiran Bayi</a>

                  </div><!-- End List group with Links and buttons -->
                  <br>
                  <div class="text-center">
                    <a href="main.php" class="btn btn-primary"><i class="bx bx-home"></i>  Home</a>
					<a href="logout.php" class="btn btn-danger">Log Out</a>
                  </div>
                </div>

               

              </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Maklumat Ibu</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-md-6">
                          <label for="nric" class="form-label">No Kad Pengenalan</label>
                          <input type="text" class="form-control" name="nric" id="nric"  >
                        </div>
                        <div class="col-md-6">
                          <label for="job" class="form-label">Pekerjaan</label>
                          <input type="text" class="form-control" name="job" id="job" >
                        </div>
                        <div class="col-md-6">
                            <label for="THA" class="form-label">THA (LMP)</label>
                            <div class="col-md-12">
                              <input type="date" class="form-control" name="tha" id="tha" >
                            </div>
                        </div>
                        <div class="col-md-6">
                          <label for="address" class="form-label">Alamat Rumah</label>
                          <textarea type="text" class="form-control" name="address"  id="address" placeholder="1234 Main St"></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="risk" class="form-label">Faktor Risiko</label>
                          <input type="text" class="form-control" name="risk" id="risk"  placeholder="e.g. premature birth">
                        </div>
                        <div class="col-md-6">
                            <label for="tal" class="form-label">TAL (EDD)</label>
                            <div class="col-md-12">
                              <input type="date" class="form-control" name="tal" id="tal" >
                            </div>
                        </div>
                        <div class="col-md-6">
                          <label for="phone" class="form-label">No Telefon (P)</label>
                          <input type="text" class="form-control" name="phone" id="phone" >
                        </div>
                        <div class="col-md-2">
                            <label for="gr" class="form-label">Gr.</label>
                            <input type="text" class="form-control" name="gr" id="gr" >
                        </div>
                        <div class="col-md-2">
                            <label for="P" class="form-label">P.</label>
                            <input type="text" class="form-control" name="p" id="p" >
                        </div>
                        <div class="col-md-2">
                            <label for="plus" class="form-label">+</label>
                            <input type="text" class="form-control" name="plus" id="plus" >
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="name" id="name" >
                        </div>
                        <div class="col-md-6">
                            <label for="husband" class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" name="husband" id="husband" >
                        </div>
                        <div class="col-md-3">
                            <label for="birth" class="form-label">Tarikh Lahir</label>
                            <div class="col-md-12">
                              <input type="date" class="form-control" name="dob"  >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="age" class="form-label">Umur</label>
                            <input type="text" class="form-control" name="age" id="age" >
                        </div>
                        <div class="col-md-6">
                            <label for="nric_husb" class="form-label">Kad Pengenalan Suami</label>
                            <input type="text" class="form-control" name="nric_husb" id="nric_husb" >
                        </div>
                        <div class="col-md-6">
                            <label for="etnik" class="form-label">Etnik</label>
                            <input type="text" class="form-control" name="etnik" id="etnik" >
                        </div>
                        <div class="col-md-6">
                            <label for="husbwork" class="form-label">Pekerjaan Suami</label>
                            <input type="text" class="form-control" name="husbwork" id="husbwork" >
                        </div>
                        <div class="col-md-6">
                            <label for="warga" class="form-label">Warganegara</label>
                            <input type="text" class="form-control" name="warga" id="warga" >
                        </div>
                        <div class="col-md-6">
                            <label for="phone2" class="form-label">No Telefon (P)</label>
                            <input type="text" class="form-control" name="phone2" id="phone2" >
                        </div>
                        <div class="col-md-6">
                            <label for="phone3" class="form-label">No Telefon (R)</label>
                            <input type="text" class="form-control" name="phone3" id="phone3" >
                        </div>
                        <div class="text-center">
						  <input type="hidden" name="act" value="add" >
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form><!-- End Multi Columns Form -->
                    </div>
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