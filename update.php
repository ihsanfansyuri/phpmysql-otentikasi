<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php 
        include 'koneksi.php';

        $nip = $_POST['nip'];
        $unit = $_POST['unit_kerja'];
        $jabatan = $_POST['jabatan'];
        $pengguna = $_POST['pengguna'];
        $nama = $_POST['nama_pegawai'];
        $tempat = $_POST['tempat_lahir'];
        $tanggal = $_POST['tanggal_lahir'];
        $foto = $_FILES['berkas']['name'];
        $temp = $_FILES['berkas']['tmp_name'];

        $folder = "file/";
        move_uploaded_file($temp, $folder.$foto);

        $query =  "UPDATE pegawai SET id_unitkerja = '$unit', id_jabatan = '$jabatan', nama_pegawai = '$nama', id_pengguna = '$pengguna',  tempat_lahir = '$tempat', tanggal_lahir = '$tanggal', foto = '$foto' WHERE nip = '$nip'";
        mysqli_query($koneksi, $query);
    
        header("Location:index.php");
    ?>
    </body>
</html>