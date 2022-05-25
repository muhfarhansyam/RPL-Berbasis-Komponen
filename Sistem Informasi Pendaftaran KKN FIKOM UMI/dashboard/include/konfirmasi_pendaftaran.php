<h2>Konfirmasi Pendaftaran</h2>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi pendaftaran.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-15 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Konfirmasi Pendaftaran</h4>
                <p class="category">Lakukan konfirmasi pendaftaran</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Mahasiswa/Mahasiswi</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama</b></td>
							<td><b>Email</b></td>
							<td><b>Stambuk</b></td>
							<td><b>P.Studi</b></td>
							<td><b>Fakultas</b></td>
							<td><b>KKN</b></td>
							<td><b>Size Jaket</b></td>
							<td><b>File</b></td>
							<td><b>Status Pendaftaran</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT a.nama,a.stb,a.pstudi,a.fakultas,a.jkkn,a.ujaket,a.upload_dpersyaratan, a.id as id_daftar, b.id as id_akun,b.email,c.* 
				    				FROM pendaftaran a, akun b, detail_pendaftaran c 
						    		WHERE a.id=b.id_user 
						    		AND b.role_user=1 
						    		AND c.id_user = a.id
                    				AND a.upload_dpersyaratan != ''
                    				";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['status_pendaftaran']		
				    	?>
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><?php echo $rows['stb']; ?></td>
										<td><?php echo $rows['pstudi']; ?></td>
										<td><?php echo $rows['fakultas']; ?></td>
										<td><?php echo $rows['jkkn']; ?></td>
										<td><?php echo $rows['ujaket']; ?></td>
										<td><?php echo $rows['upload_dpersyaratan']; ?></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></td>
										<td>
											<!-- <a href="include/download.php?id=<?=$result['id']?>" class="btn btn-primary btn-sm">download dokumen</a>   -->
											<a href="include/proses_konfirmasi_pendaftaran.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>Belum ada data </b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>