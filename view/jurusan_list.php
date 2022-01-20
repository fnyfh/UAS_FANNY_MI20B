<?php
include '../controller/Anggota.php';
error_reporting(0);
$ctrl = new Anggota();
$hasil = $ctrl->getJenisData3();
// var_dump($hasil);
// die;
?>
 
<!DOCTYPE html>
<html>

<head>
  <title>LIST JURUSAN</title>
  <!-- <link href="assets/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <?php
    $pesan = $_GET['pesan'];
    $frm = $_GET['frm'];
    // echo $pesan;
    if ($pesan == 'success' && $frm == 'edit') {
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
    }
    ?>
    <br>
    <h1 align="center">LIST JURUSAN</h1>
    <div align="right">
    <a href="add.php" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
    </div>
    <br>
    <table class="table table-bordered table-hover">
      <thead class="table-dark text-center">
        <tr>
          <th>ID Jurusan</th>
          <th colspan="2">Jurusan</th>
        </tr>
      </thead>

      <tbody>
      <?php foreach ($hasil as $dataJur) { ?>
          <tr>
            <td align="center"><?= $dataJur["id"]; ?></td>
            <td><?= $dataJur["jurusan"]; ?></td>
            <td align="center">
              <a href="#" class="btn btn-outline-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
              <a href="#" data-bs-toggle="modal" data-bs-target="#deletedata<?php echo $dataJur['id']; ?>" class="btn btn-outline-secondary" title="Hapus"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          <div class="example-modal">
            <div id="deletedata<?php echo $dataJur['id'] ?>" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog"> 
                <div class="modal-content">
                  <form class="row g-3" method="post" action="" name="form1">
                    <div class="modal-header">
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                      <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $dataJur['id']; ?>">
                      <h4 align="center">Apakah anda yakin ingin menghapus data <?php echo $dataJur['jurusan']; ?> ?
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