<h2>Pembayaran</h2>
<?php  
$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	
?>


<div class="row"> 	
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Pembayaran</h4>
                <p class="category">Lakukan Pembayaran Kemudian lampirkan pada dokumen persyaratan</p>
            </div>
            <div class="card-content">
            
            <h4><b>Pembayaran hanya dilakukan melalui Account Virtual : 213123123131 (NAMA BANK)</b></h4>
            <h4><b>Harap Memperhatikan Nomor VA sebelum melakukan pembayaran </b></h4>
			<h4><b>Biaya yang harus dibayarkan sebagai berikut: </b></h4>
			<ol>
				<li><b>KKN TEMATIK DAN PROFESI: </b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Biaya Pendaftaran</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.1.300.000</b></td>
						</tr>
					</tbody>
				</table>
			</ol>
                

            </div>
        </div>
    </div>
</div>



<!-- MODAL -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Metode Pembayaran</h4>
        </div>
        <div class="modal-body">
        <form action="index.php?page=13" method="get">
        	<input type="hidden" name="page" value="13">
          <div class="form-group">
              <label for="">Metode Pembayaran</label>
              <select name="metode_pembayaran" class="form-group">
                  <option value="0">Lunas</option>
                  <option value="1">Cicil (2x)</option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Pilih</button>
          </form>
        </div>
      </div>
      
    </div>
</div>