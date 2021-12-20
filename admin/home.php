<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Beranda</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>

						<?php
						include '../koneksi.php';
							$s = mysqli_query($koneksi,"select * from dosen");
							$jml = mysqli_num_rows($s);
						?>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml; ?></div>
							<div class="text-muted">Jumlah Peserta</div>
						</div>
						
					</div>
								
				</div>

				<br>
				<div class="row no-padding">

<div class="">
	<h1>Tambah PERIODE</h1>
</div>
<form method="POST"> 
<div class="form-group">
<label for="nama_periode">Nama Periode </label>
<input type="text" class="form-control" id="nama_periode" name="nama_periode" >  
</div>  
<div class="form-group">
<button type="submit" value="simpan" name="simpan" class="btn btn-primary">Input</button>
<button type="Reset" class="btn btn-warning">Reset</button>
<?php
                                if (isset($_POST['simpan'])) {
                                    $nama_periode = $_POST['nama_periode'];

                                    $tambah = mysqli_query($koneksi, "insert into periode (id_periode,periode) VALUES ('','$nama_periode')");
									
                                    if ($tambah) {
                                        ?>
                                        <script type="text/javascript">
                                            alert('Tambah data berhasil');
                                            
                                        </script>
                                        <?php
                                    }else {
                                        echo "Gagal menambahkan data!!";
                                    }
                                }
                            ?>
</div>   

</form>


</div>
			</div>
			
		</div><!--/.row-->