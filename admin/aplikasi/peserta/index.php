<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location: ../../login.php");
}else{
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrator SPK Dosen Terbaik</title>

<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="../../datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../datatables/css/jquery.dataTables.css">

<!--Icons-->
<script src="../../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>SPK</span> Pemilihan Dosen Terbaik </a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
				<center><img src="../../../assets/img/uui.png" width="100px" height="100px"></center>
		</form>
		<ul class="nav menu">
		<li><a href="../../index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a></li>
			<li><a href="index.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"></use></svg> Data Peserta</a></li>
			<li><a href="../kriteria/index.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-notepad"></use></svg> Data Kriteria</a></li>
			<li><a href="../hmp_kriteria/hmp_kriteria.php"><svg class="glyph stroked table"><use xlink:href="#stroked-open-folder"></use></svg> Himpunan Kriteria</a></li>
			<li><a href="../nilai/index.php"><svg class="glyph plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Input Nilai</a></li>
			<li><a href="../perhitungan/index.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-calendar"></use></svg> Perhitungan</a></li>
			<!-- <li><a href="../pemenang/pemenang.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Email Pemenang</a></li> -->
			
			<!-- <li <?php if (isset($_GET['ap']) && $_GET['ap']=="laporan") echo "class='active'";?>><a href="?ap=laporan"><svg class="glyph stroked app-window"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Laporan</a></li> -->
		
			<li role="presentation" class="divider"></li>
			<li><a href="../../logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-lock"></use></svg> Sign Out</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<?php 
			include "../../koneksi.php";
		?>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Data Peserta</h3>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
					<table class="table">
		<!--form upload file-->
		<form method="post" enctype="multipart/form-data" action="proses.php">
    <div class="form-group">
        <label for="exampleInputFile">Import data excel</label>
        <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
    </div>
	<div align="left">
				<a href="contoh_file.xlsx" class="btn btn-default">
					<small class="glyphicon glyphicon-download"></small>
					Download Format File
				</a><br><br></div>
    <button type="submit" class="btn btn-primary">Import</button>
</form>
	</table>
	
	<table class="table table-striped table-bordered data">
						    <thead>
						    <tr>
						        <th>No</th>
								<th>NIDN</th>
								<th>Nama</th>
								<!-- <th>Alamat</th> -->
								<th>Email</th>
								<th>Telepon</th>

								<!-- <th>Aksi</th> -->
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    include "../../koneksi.php";
						    $no=0;
							$query = "select * from dosen";
							$hasil = mysqli_query($koneksi,$query) or die("");
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['nidn']; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<!-- <td><?php echo $data['alamat']; ?></td> -->
								<td><?php echo $data['email']; ?></td>
								<td><?php echo $data['telp']; ?></td>
<!-- 
								<td><button class="btn btn-info btn-sm" id="btn-todo">Edit</button> 
									<button class="btn btn-warning btn-sm" id="btn-todo">Hapus</button></td> -->
							<?php
							}
							
							?>

							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
</div>

	</div>
</div>	<!--/.main-->



	<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/chart.min.js"></script>
	<script src="../../js/chart-data.js"></script>
	<script src="../../js/easypiechart.js"></script>
	<script src="../../js/easypiechart-data.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	<script src='../../js/jquery.min.js'></script>
	  <script src="../../js/index.js"></script>
<script src="../../datatables/js/jquery.dataTables.min.js"></script>
<script src="../../datatables/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "language":{
          "order": [[ 1, "desc" ]],
          "decimal":        "",
          "emptyTable":     "Tidak ada data pada tabel ini",
          "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 data",
          "infoFiltered":   "( Disaring dari _MAX_ total data)",
          "infoPostFix":    "",
          "thousands":      ",",
          "lengthMenu":     "Tampilkan _MENU_ data",
          "loadingRecords": "Memuat...",
          "processing":     "Memproses...",
          "search":         "Cari:",
          "zeroRecords":    "Tidak ada data yang ditemukan",
          "paginate": {
              "first":      "Pertama",
              "last":       "Terakhir",
              "next":       "Selanjutnya",
              "previous":   "Sebelumnya"
          },
          "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
          }
      }
      });
  });
  </script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
<?php
}
?>