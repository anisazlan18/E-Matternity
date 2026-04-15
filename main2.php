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
	
$tahun		= (isset($_POST['tahun'])) ? trim($_POST['tahun']) : '';
$hasil		= (isset($_POST['hasil'])) ? trim($_POST['hasil']) : '';
$jenis 		= (isset($_POST['jenis'])) ? trim($_POST['jenis']) : '';
$tempat		= (isset($_POST['tempat'])) ? trim($_POST['tempat']) : '';
$jantina	= (isset($_POST['jantina'])) ? trim($_POST['jantina']) : '';
$berat		= (isset($_POST['berat'])) ? trim($_POST['berat']) : '';
$komplikasi_ibu	= (isset($_POST['komplikasi_ibu'])) ? trim($_POST['komplikasi_ibu']) : '';
$komplikasi_anak= (isset($_POST['komplikasi_anak'])) ? trim($_POST['komplikasi_anak']) : '';
$susuan		= (isset($_POST['susuan'])) ? trim($_POST['susuan']) : '';
$keadaan	= (isset($_POST['keadaan'])) ? trim($_POST['keadaan']) : '';

$keadaan	=	mysqli_real_escape_string($con, $keadaan);

if($act == "add")
{	
	$SQL_insert = " 
		INSERT INTO `kandungan_lalu`(`id_patient`, `tahun`, `hasil`, `jenis`, `tempat`, `jantina`, `berat`, `komplikasi_ibu`, `komplikasi_anak`, `susuan`, `keadaan`) 
		VALUES ('$id_patient', '$tahun', '$hasil', '$jenis', '$tempat', '$jantina', '$berat', '$komplikasi_ibu', '$komplikasi_anak', '$susuan', '$keadaan') 
	";	

	$result = mysqli_query($con, $SQL_insert) or die("Error in query: ".$SQL_insert."<br />".mysqli_error($con));
	
	print "<script>self.location='main2.php?id_patient=" . $id_patient . "';</script>";
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
                    <a href="main1.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Maklumat Ibu</a>
                    <a href="main2.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action active" aria-current="true" >Perihal Kandungan Lalu</a>
                    <a href="main3.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Riwayat Kesihatan Ibu/Keluarga</a>
                    <a href="main4.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Kandungan Sekarang</a>
                    <a href="main5.php?id_patient=<?PHP echo $id_patient; ?>" class="list-group-item list-group-item-action">Pemeriksaan Kandungan Sekarang</a>
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

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Perihal Kandungan Lalu</h5>

              <!-- Vertically centered Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
               Tambah
              </button>
			  
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
				  <form action="" method="post" class="">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Perihal Kandungan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Tahun</label>
                          <input type="text" class="form-control" name="tahun" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Hasil Kandungan</label>
                          <input type="text" class="form-control" name="hasil" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Jenis Kelahiran</label>
                          <input type="text" class="form-control" name="jenis" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Tempat dan Disambut Oleh</label>
                          <input type="text" class="form-control" name="tempat" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Jantina</label>
                          <select class="form-control" name="jantina" required>
							<option value="Lelaki">Lelaki</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Lain">Lain</option>
						  </select>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Berat Lahir (kg)</label>
                          <input type="text" class="form-control" name="berat" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Komplikasi Ibu</label>
                          <input type="text" class="form-control" name="komplikasi_ibu" >
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Komplikasi Anak</label>
                          <input type="text" class="form-control" name="komplikasi_anak" >
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Penyusuan Susu Ibu/Tempoh</label>
                          <input type="text" class="form-control" name="susuan" >
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Keadaan Anak Sekarang</label>
                          <input type="text" class="form-control" name="keadaan" >
                        </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					  <input type="hidden" name="act" value="add" >
					  <input type="hidden" name="id_patient" value="<?PHP echo $id_patient;?>" >
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
				  </form>
                  </div>
                </div>
			 </div>

			<div class="table-responsive">
            <!-- Table with stripped rows -->
            <table class="table   table-striped table-bordered" >
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


<script>
$(document).ready(function() {

  
	$('#dataTable').DataTable( {
		paging: true,
		
		searching: true
	} );
		
	
});
</script>


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