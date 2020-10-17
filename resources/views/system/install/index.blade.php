
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Blank</title>

	<!-- Custom fonts for this template-->
	<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">


		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">Kuruluma Hoşgeldiniz</h1>



          <div class="row">

            <div class="col-lg-12">

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Gereklilikler</h6>
                </div>
                <div class="card-body">
                  <ul>
                    <li>PHP versiyonunuz 7.4 veya yukarısı olmalıdır. Mevcut versiyonunuz: {{ phpversion() }}</li>
                    <li>Veritabanı bağlantısı yapılmış olmalıdır.</li>
                    <li><a href="{{ url('install?step=2') }}">Gerekliler tamamsa devam et</a></li>
                  </ul>
                </div>
              </div>

            </div>

          </div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2020</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Core plugin JavaScript-->
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
