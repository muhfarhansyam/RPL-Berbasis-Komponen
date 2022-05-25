<?php  

include '../koneksi/koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNamedpersyaratan   = date("h-m-s").basename( $_FILES['dpersyaratan']['name']);
    $targetfolder   = $targetfolderBase . $fileNamedpersyaratan;
    $ok=1;

    $file_type=$_FILES['dpersyaratan']['type'];

    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

         if(move_uploaded_file($_FILES['dpersyaratan']['tmp_name'], $targetfolder))

         {

            $query  = "UPDATE pendaftaran SET upload_dpersyaratan='$fileNamedpersyaratan' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
             echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Berhasil!</strong> Upload Dokumen Persyaratan(PDF, JPEG, PNG).
            </div>";   
            }
             
         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Dokumen Persyaratan(PDF, JPEG, PNG).
        </div>";

         }

        }

    else {

     echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Dokumen Persyaratan harus format(.PDF, JPEG, PNG).
        </div>";

    }    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Upload Dokumen Persyaratan</h4>
                <p class="category">Upload dengan format yang benar(PDF)</p>
                <a href="index.php?page=4" class="btn btn-primary btn-md pull-right" style="margin-top: -40px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Dokumen Persyaratan(PDF) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="dpersyaratan" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Dokumen Persyaratan (PDF)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    
                    </div>  
                    <hr> 

                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>