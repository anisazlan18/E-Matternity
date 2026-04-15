<?PHP
session_start();

include("database.php");
if( !verifyAdmin($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$id_staff	= (isset($_GET['id_staff'])) ? trim($_GET['id_staff']) : '';
$id_hospital= (isset($_GET['id_hospital'])) ? trim($_GET['id_hospital']) : '';	
	
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password	= (isset($_POST['password'])) ? trim($_POST['password']) : '';
$level 		= (isset($_POST['level'])) ? trim($_POST['level']) : '';

if($act == "add")
{	
	$SQL_insert = " 
		INSERT INTO `staff`(`username`, `password`, `level`) 
		VALUES ('$username', '$password', '$level') 
	";	

	$result = mysqli_query($con, $SQL_insert) or die("Error in query: ".$SQL_insert."<br />".mysqli_error($con));
}

if($act == "add_hospital")
{	
	$SQL_insert = " 
		INSERT INTO `hospital`(`username`, `password`) 
		VALUES ('$username', '$password') 
	";	

	$result = mysqli_query($con, $SQL_insert) or die("Error in query: ".$SQL_insert."<br />".mysqli_error($con));
}


if($act == "del")
{
	$SQL_delete = " DELETE FROM `staff` WHERE `id_staff` =  '$id_staff' ";
	$result = mysqli_query($con, $SQL_delete) or die("Error in query: ".$SQL_delete."<br />".mysqli_error($con));
	
	print "<script>self.location='ad-main.php';</script>";
}

if($act == "del_hospital")
{
	$SQL_delete = " DELETE FROM `hospital` WHERE `id_hospital` =  '$id_hospital' ";
	$result = mysqli_query($con, $SQL_delete) or die("Error in query: ".$SQL_delete."<br />".mysqli_error($con));
	
	print "<script>self.location='ad-main.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Senarai Pengguna</title>
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
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Senarai Pengguna</h5>
			
			<!-- Vertically centered Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
               Tambah
              </button>
			  
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
				  <form action="" method="post" class="">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Password</label>
                          <input type="text" class="form-control" name="password" required>
                        </div>
						

						<div class="col-md-12">
                          <label for="xxx" class="form-label">Level</label>
                          <select class="form-control" name="level" required>
							<option value="jururawat">Jururawat</option>
							<option value="doktor">Doktor</option>
						  </select>
                        </div>
						

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					  <input type="hidden" name="act" value="add" >
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
				  </form>
                  </div>
                </div>
			 </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                  <th scope="col">Level</th>
				  <th></th>
                </tr>
              </thead>
              <tbody>
			  <?PHP
				$bil = 0;
				$SQL_patient = "SELECT * FROM `staff` " ;
				$result = mysqli_query($con, $SQL_patient) or die("Error in query: ".$SQL_patient."<br />".mysqli_error($con));
				while ( $data	= mysqli_fetch_array($result) )
				{
					$bil++; 
				?>
                <tr>
                  <th scope="row"><?PHP echo $bil;?></th>
                  <td><?PHP echo $data["username"]; ?></td>
                  <td><?PHP echo $data["password"]; ?></td>
				  <td><?PHP echo $data["level"]; ?></td>
                  <td><a onclick="return confirm('Are you sure?');" href="?act=del&id_staff=<?PHP echo $data["id_staff"]; ?>" class="btn btn-danger" role="button">Del</a></td>
                </tr>
				<?PHP } ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
			


          </div>
        </div>
      </div> 
    </section>
	
	
	
	
	
	
	
	
	
	
	
	<section class="section">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Senarai Hospital</h5>
			
			<!-- Vertically centered Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modHospital">
               Tambah
              </button>
			  
              <div class="modal fade" id="modHospital" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
				  <form action="" method="post" class="">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Hospital</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Hospital</label>
                          <input type="text" class="form-control" name="username" required>
                        </div>
						
						<div class="col-md-12">
                          <label for="xxx" class="form-label">Password</label>
                          <input type="text" class="form-control" name="password" required>
                        </div>
										

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					  <input type="hidden" name="act" value="add_hospital" >
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
				  </form>
                  </div>
                </div>
			 </div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Hospital</th>
                  <th scope="col">Password</th>
				  <th></th>
                </tr>
              </thead>
              <tbody>
			  <?PHP
				$bil = 0;
				$SQL_host = "SELECT * FROM `hospital` " ;
				$result = mysqli_query($con, $SQL_host) or die("Error in query: ".$SQL_host."<br />".mysqli_error($con));
				while ( $data	= mysqli_fetch_array($result) )
				{
					$bil++; 
				?>
                <tr>
                  <th scope="row"><?PHP echo $bil;?></th>
                  <td><?PHP echo $data["username"]; ?></td>
                  <td><?PHP echo $data["password"]; ?></td>
                  <td><a onclick="return confirm('Are you sure?');" href="?act=del&id_hospital=<?PHP echo $data["id_hospital"]; ?>" class="btn btn-danger" role="button">Del</a></td>
                </tr>
				<?PHP } ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
			
			<a href="logout.php" class="btn btn-danger">Log Out</a>

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