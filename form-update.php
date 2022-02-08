<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <title>Update Data</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Update Data Kepegawaian</a>
            </div>
        </nav>

        <?php
        
        session_start();

        if (empty($_SESSION['username'])) {
            header("location:login.php");
        }
        


        include 'koneksi.php';
        $id = $_GET['id'];
        $pegawai = mysqli_query($koneksi, "SELECT * from pegawai inner join jabatan on pegawai.id_jabatan = jabatan.id_jabatan inner join unit_kerja on pegawai.id_unitkerja = unit_kerja.id_unitkerja inner join pengguna on pegawai.id_pengguna = pengguna.id_pengguna where nip='$id'");
        $row = mysqli_fetch_array($pegawai);
        $jabatan = array('Dosen', 'Guru', 'Dokter');
        $unit = array('Banjarmasin', 'Banjarbaru', 'Kandangan');
        $pengguna = ('1');
        ?>

        <div class="container">
            <div class="card">

                <h2>Update Data</h2>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['nip']; ?>" name="nip">
                    <input type="hidden" value="<?php echo $row['id_pengguna']; ?>" name="id_pengguna">

                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" value="<?php echo $row['nip']; ?>" name="nip" id="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama_pegawai']; ?>" name="nama_pegawai" id="nama_pegawai" >
                    </div>
                    <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>

                    <select class="form-select" name="id_jabatan" id="id_jabatan">
                        <option selected ><?php echo $row['nama_jabatan']; ?></option>
                        <?php

                        foreach ($jabatan as $j) {
                            echo "<option value='$j' ";
                            echo $row['id_jabatan']==$j?'selected="selected"':'' ;
                            echo ">$j</option>";
                        }
                        
                        ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="unit" class="form-label">Unit Kerja</label>
                        
                    <select class="form-select" name="id_unitkerja" id="id_unitkerja">
                        <option selected ><?php echo $row['nama_unitkerja']; ?></option>
                        <?php

                        foreach ($unit as $u) {
                            echo "<option value='$u' ";
                            echo $row['id_unitkerja']==$u?'selected="selected"':'' ;
                            echo ">$u</option>";
                        }

                        ?>
                    </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="<?php echo $row['tempat_lahir'];?>" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Lahir (YYYY-MM-DD)</label>
                        <input type="text" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" name="tanggal_lahir" id="tanggal-lahir" >
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto</label>
                        <input type="file" name="berkas" size="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a class="btn btn-primary tombol" href="index.php" role="button">Kembali</a>
                </form>
            </div>
        </div>
    </body>
</html>