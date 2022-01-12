<?php
include '../controller/Anggota.php';
error_reporting(0);
// var_dump($hasil);
$ctrl = new Anggota();
$hasil = $ctrl->index();
?>
 
<!DOCTYPE html>
<html>

<head>
  <title>Data Anggota LP3I COMPUTER CLUB</title>
  <!-- <link href="assets/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
        <div class="example-modal">
            <div id="logout" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form method="post" action="<?php echo $ctrl->Logout() ?>" name="form1">
                    <div class="modal-header">
                      <h3 class="modal-title">Log Out</h3>
                    </div>
                    <div class="modal-body">
                      <h5 align="center">Apakah anda yakin ingin keluar?<strong><span class="grt"></span></strong></h5>
                    </div>
                    <div class="modal-footer">
                      <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary" name="logout">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
  <div class="container">
    <?php
    $pesan = $_GET['pesan'];
    $frm = $_GET['frm'];
    // echo $pesan;
    if ($pesan == 'success' && $frm == 'add') {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menambahkan data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    } else  if ($pesan == 'success' && $frm == 'edit') {
    ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil update data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    } else  if ($pesan == 'success' && $frm == 'del') {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Data dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    } else  if ($pesan == 'success' && $frm == 'login') {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda Berhasil Login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }else if (isset($_GET['pesan']) == 'failed' && isset($_GET['frm']) == 'login') {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Can't Login!</strong> Username atau Password salah!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }
    ?>
    <div align="left">
      <a href="#" class="btn btn-outline-primary action-button" role="button" data-bs-toggle="modal" data-bs-target="#logout"><i class="bi bi-box-arrow-left"></i></a>
    </div>
    <br>
    <h1 align="center">DATA ANGGOTA
      <!-- LP3I COMPUTER CLUB 2021/2022 -->
    </h1>
    <div align="right">
    <a href="add.php" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
    <a href="report.php" class="btn btn-outline-info"><i class="bi bi-printer"></i> Cetak</a>
    </div>
    <br>
    <table class="table table-bordered table-hover">
      <thead class="table-dark text-center">
        <tr>
          <td>NIM</td>
          <td>Nama Lengkap</td>
          <td>NO HP</td>
          <td>Alamat</td>
          <td>Jurusan</td>
          <td colspan="2">Jabatan</td>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($hasil as $data) { ?>

          <tr>
            <td><?= $data["nim"]; ?></td>
            <td><?= $data["nama"]; ?></td>
            <td><?= $data["no_hp"]; ?></td>
            <td><?= $data["alamat"]; ?></td>
            <td><?= $data["jurusan"]; ?></td>
            <td><?= $data["jabatan"]; ?></td>
            <td align="center">
              <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
              <a href="#" data-bs-toggle="modal" data-bs-target="#deletedata<?php echo $data['id']; ?>" class="btn btn-outline-secondary" title="Hapus"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          <div class="example-modal">
            <div id="deletedata<?php echo $data['id'] ?>" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog"> 
                <div class="modal-content">
                  <form class="row g-3" method="post" action="<?php $ctrl->hapusData() ?>" name="form1">
                    <div class="modal-header">
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                      <h3 class="modal-title">Konfirmasi Delete Data Anggota</h3>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                      <h4 align="center">Apakah anda yakin ingin menghapus data <?php echo $data['nim']; ?> ?
                        <strong><span class="grt"></span></strong>
                      </h4>
                    </div>
                    <div class="modal-footer">
                      <button id="nodelete" type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal">
                        Cancel</button>
                      <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>