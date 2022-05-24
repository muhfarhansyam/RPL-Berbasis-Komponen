<h1>Tambah Dosen</h1>

<?php  

    $query="select * from dosen order by nidn desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['nidn'];
        $baru=substr($kode,3,7);
          $nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=4-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 ="117".$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }
 

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($nidn == "") {
		array_push($err, "nidn tidak boleh kosong");
		$valid = false;
	}

	if ($nama == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}

	if ($alamat == "") {
		array_push($err, "alamat tidak boleh kosong");
		$valid = false;
	}

	if ($telp == "") {
		array_push($err, "telp tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO dosen VALUES(null, '$nidn', '$nama', '$alamat', '$telp')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah dosen";
			echo '<script>window.location = "index.php?page=10"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['nidn']);
	unset($_SESSION['nama']);
	unset($_SESSION['alamat']);
	unset($_SESSION['telp']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Dosen Supervisi</h4>
                <p class="category">Masukan data dosen dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Dosen</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nidn">NIDN</label>
						<input type="text" class="form-control" name="nidn" name="nidn" value="<?php isset($_SESSION['nidn'])  ?  print($_SESSION['nidn']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Dosen</label>
						<input type="text" class="form-control" name="nama" value="<?php isset($_SESSION['nama'])  ?  print($_SESSION['nama']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Alamat</label>
						<textarea name="alamat" cols="20" rows="4" class="form-control"><?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="telp">No Telp/Hp</label>
						<input type="text" class="form-control" name="telp" value="<?php isset($_SESSION['telp'])  ?  print($_SESSION['telp']) : ""; ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
