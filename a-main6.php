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
	
$bbirth		= (isset($_POST['bbirth'])) ? trim($_POST['bbirth']) : '';
$bgender	= (isset($_POST['bgender'])) ? trim($_POST['bgender']) : '';
$bplacebirth= (isset($_POST['bplacebirth'])) ? trim($_POST['bplacebirth']) : '';
$bweight	= (isset($_POST['bweight'])) ? trim($_POST['bweight']) : '';
$bsambut	= (isset($_POST['bsambut'])) ? trim($_POST['bsambut']) : '';
$uri		= (isset($_POST['uri'])) ? trim($_POST['uri']) : '';
$sintometrin= (isset($_POST['sintometrin'])) ? trim($_POST['sintometrin']) : '';
$ergometrin	= (isset($_POST['ergometrin'])) ? trim($_POST['ergometrin']) : '';
$lahir_spontan	= (isset($_POST['lahir_spontan'])) ? trim($_POST['lahir_spontan']) : '';
$lahir_alat	= (isset($_POST['lahir_alat'])) ? trim($_POST['lahir_alat']) : '';
$indication	= (isset($_POST['indication'])) ? trim($_POST['indication']) : '';
$lahir_caesarean	= (isset($_POST['lahir_caesarean'])) ? trim($_POST['lahir_caesarean']) : '';
$indication2= (isset($_POST['indication2'])) ? trim($_POST['indication2']) : '';

$pph		= (isset($_POST['pph'])) ? trim($_POST['pph']) : '';
$perineum	= (isset($_POST['perineum'])) ? trim($_POST['perineum']) : '';
$lain4		= (isset($_POST['lain4'])) ? trim($_POST['lain4']) : '';
$lahir_hidup= (isset($_POST['lahir_hidup'])) ? trim($_POST['lahir_hidup']) : '';
$apgar		= (isset($_POST['apgar'])) ? trim($_POST['apgar']) : '';
$abnormaliti= (isset($_POST['abnormaliti'])) ? trim($_POST['abnormaliti']) : '';
$abn_nyata	= (isset($_POST['abn_nyata'])) ? trim($_POST['abn_nyata']) : '';

if($act == "edit")
{	
	$SQL_update = " 
		UPDATE
			`patient`
		SET
			`bbirth` = '$bbirth',
			`bgender` = '$bgender',
			`bplacebirth` = '$bplacebirth',
			`bweight` = '$bweight',
			`bsambut` = '$bsambut',
			`uri` = '$uri',
			`sintometrin` = '$sintometrin',
			`ergometrin` = '$ergometrin',
			`lahir_spontan` = '$lahir_spontan',
			`lahir_alat` = '$lahir_alat',
			`indication` = '$indication',
			`lahir_caesarean` = '$lahir_caesarean',
			`indication2` = '$indication2',
			`pph` = '$pph',
			`perineum` = '$perineum',
			`lain4` = '$lain4',
			`lahir_hidup` = '$lahir_hidup',
			`apgar` = '$apgar',
			`abnormaliti` = '$abnormaliti',
			`abn_nyata` = '$abn_nyata'
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

  <title>Kelahiran Bayi</title>
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
                    <a href="a-main4.php" class="list-group-item list-group-item-action" >Kandungan Sekarang</a>
                    <a href="a-main5.php" class="list-group-item list-group-item-action">Pemeriksaan Kandungan Sekarang</a>
                    <a href="a-main6.php" class="list-group-item list-group-item-action active"aria-current="true">Perihal Kelahiran Bayi</a>
					<a href="a-main7.php" class="list-group-item list-group-item-action">Kata Laluan</a>
                  </div><!-- End List group with Links and buttons -->
                  <br>
                  <div class="text-center">
                    <a href="logout.php" class="btn btn-primary">Log Out</a>
                  </div>
                </div>

               

              </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Perihal Kelahiran Bayi</h5>
        
                      <!-- Multi Columns Form -->
                      <form method="post" action="" class="row g-3">
                        <div class="col-md-6">
                          <label for="bbirth" class="form-label">Tarikh Lahir dan Masa</label>
                          <input type="text" class="form-control" name="bbirth"  value="<?PHP echo $data["bbirth"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                          <label for="bgender" class="form-label">Jantina</label>
                          <input type="text" class="form-control" name="bgender" value="<?PHP echo $data["bgender"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="bplacebirth" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="bplacebirth" value="<?PHP echo $data["bplacebirth"]; ?>" disabled>
                          </div>
                        <div class="col-md-6">
                          <label for="bweight" class="form-label">Berat Lahir (kg)</label>
                          <input type="text" class="form-control" name="bweight" value="<?PHP echo $data["bweight"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                          <label for="bsambut" class="form-label">Disambut Oleh</label>
                          <input type="text" class="form-control" name="bsambut" value="<?PHP echo $data["bsambut"]; ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Uri</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="uri" id="uri" value="1" <?PHP if($data["uri"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="gridRadios3">
                                Lengkap
                              </label>
                            </div>
      
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="uri" id="uro" value="0" <?PHP if($data["uri"] =="0") echo "checked";?> disabled>
                              <label class="form-check-label" for="gridRadios4">
                                Tidak Lengkap
                              </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Suntikan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="sintometrin" value="1" <?PHP if($data["sintometrin"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="sintometrin">Sintometrin</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="ergometrin" value="1" <?PHP if($data["ergometrin"] =="1") echo "checked";?> disabled>
                                <label class="form-check-label" for="flexSwitchCheckDefault">Ergometrin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Cara Kelahiran - Spontan</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_spontan" id="lahir_spontan" value="sefalik" <?PHP if($data["lahir_spontan"] =="sefalik") echo "checked";?> disabled>
                              <label class="form-check-label" for="sefalik">
                                Sefalik
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_spontan" id="lahir_spontan"  value="breech" <?PHP if($data["lahir_spontan"] =="breech") echo "checked";?> disabled>
                              <label class="form-check-label" for="gridRadios6">
                                Breech
                              </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lahir_spontan" id="lahir_spontan" value="assisted" <?PHP if($data["lahir_spontan"] =="assisted") echo "checked";?> disabled>
                                <label class="form-check-label" for="assisted">
                                Assisted Breech
                                </label>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Cara Kelahiran - Kelahiran Menggunakan Alat</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_alat" id="lahir_alat" value="forceps" <?PHP if($data["lahir_alat"] =="forceps") echo "checked";?> disabled>
                              <label class="form-check-label" for="forceps">
                                Forceps
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_alat" id="lahir_alat" value="ventouse" <?PHP if($data["lahir_alat"] =="ventouse") echo "checked";?> disabled>
                              <label class="form-check-label" for="ventouse">
                                Ventouse
                              </label>
                            </div>
                            <div class="form-check">
                                <label for="indication" class="form-label">Indikasi</label>
                                <input type="text" class="form-control" name="indication" value="<?PHP echo $data["indication"]; ?>" disabled>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Cara Kelahiran - Caesarean</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_caesarean" id="lahir_caesarean"  value="elektif" <?PHP if($data["lahir_caesarean"] =="elektif") echo "checked";?> disabled>
                              <label class="form-check-label" for="elektif">
                                Elektif
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_caesarean" id="lahir_caesarean"  value="kecemasan" <?PHP if($data["lahir_caesarean"] =="kecemasan") echo "checked";?> disabled>
                              <label class="form-check-label" for="kecemasan">
                                Kecemasan
                              </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lahir_caesarean" id="lahir_caesarean"  value="lscs" <?PHP if($data["lahir_caesarean"] =="lscs") echo "checked";?> disabled>
                                <label class="form-check-label" for="lscs">
                                  LSCS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lahir_caesarean" id="lahir_caesarean"  value="klasikal" <?PHP if($data["lahir_caesarean"] =="klasikal") echo "checked";?> disabled>
                                <label class="form-check-label" for="klasikal">
                                  Klasikal
                                </label>
                            </div>
                            <div class="form-check">
                                <label for="indication2" class="form-label">Indikasi</label>
                                <input type="text" class="form-control" name="indication2" value="<?PHP echo $data["indication2"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Komplikasi Semasa Bersalin</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="pph" id="pph"  value="1" <?PHP if($data["pph"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="pph">
                                PPH
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="perineum" id="perineum"  value="1" <?PHP if($data["perineum"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="perineum">
                                Luka Perineum
                              </label>
                            </div>
                            <div class="form-check">
                                <label for="lain4" class="form-label">Lain-lain</label>
                                <input type="text" class="form-control" name="lain4" value="<?PHP echo $data["lain4"]; ?>" disabled>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Rekod Bayi - Keadaan Bayi</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_hidup" id="lahir_hidup"  value="1" <?PHP if($data["lahir_hidup"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="lahir_hidup">
                                Lahir hidup
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="lahir_hidup" id="lahir_hidup"  value="0" <?PHP if($data["lahir_hidup"] =="0") echo "checked";?> disabled>
                              <label class="form-check-label" for="lahir_hidup">
                                Lahir mati
                              </label>
                            </div>
                            <div class="form-check">
                                <label for="apgar" class="form-label">Skop Apgar</label>
                                <input type="text" class="form-control" name="apgar" value="<?PHP echo $data["apgar"];?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sambut" class="form-label">Rekod Bayi - Abnormaliti Kongenital</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="abnormaliti" id="abnormaliti"  value="1" <?PHP if($data["abnormaliti"] =="1") echo "checked";?> disabled>
                              <label class="form-check-label" for="gridRadios17">
                                Ada 
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="abnormaliti" id="abnormaliti"  value="0" <?PHP if($data["abnormaliti"] =="0") echo "checked";?> disabled>
                              <label class="form-check-label" for="gridRadios18">
                                Tiada
                              </label>
                            </div>
                            <div class="form-check">
                                <label for="abn_nyata" class="form-label">Nyatakan</label>
                                <input type="text" class="form-control" name="abn_nyata" value="<?PHP echo $data["abn_nyata"]; ?>" disabled>
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