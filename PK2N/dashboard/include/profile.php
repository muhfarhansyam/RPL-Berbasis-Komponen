<h2>Profile</h2>

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
<div class="card" style="margin-top: 50px">
<div class="card-header" data-background-color="blue">
<h4 class="title">Biodata Pendaftar</h4>
<p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
</div>
<div class="card-content table-responsive">

<h3 style="overflow: hidden;"><b>Data Mahasiswa/i</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Email</b></td>
            <td>: <?php echo $email; ?> </td>
        </tr>
        <tr>
            <td><b>Nama Lengkap</b></td>
            <td>: <?php echo $nama; ?></td>
        </tr>
        <tr>
            <td><b>Stambuk</b></td>
            <td>: <?php echo $stb;; ?></td>
        </tr>
        <tr>
            <td><b>TTL</b></td>
            <td>: <?php echo $tempat_lahir.", ".$tanggal_lahir;; ?>, <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2009-01-01"; ?></td>
        </tr>
        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>: <?php echo $jenis_kelamin; ?></td>
        </tr>
        
        <tr>
            <td><b>Program Studi</b></td>
            <td>: <?php echo $pstudi; ?></td>
        </tr>
        
        <tr>
            <td><b>Fakultas</b></td>
            <td>: <?php echo $fakultas; ?></td>
        </tr>
        <tr>
            <td><b>Jenis KKN</b></td>
            <td>: <?php echo $jkkn; ?></td>
        </tr>
        <tr>
            <td><b>Ukuran Jaket KKN</b></td>
            <td>: <?php echo $ujaket; ?></td>
        </tr>
    </tbody>
</table>
    </tbody>
</table>

