<?php
error_reporting(0);
include '../controller/Anggota.php';

$ctrl = new Anggota();
$id = $_GET['id'];
// $query = mysqli_query($con, "SELECT * FROM tbl_anggota where id = '$id'");
$isiAnggota = $ctrl->getData($id);
$query3 = $ctrl->getJenisData2($id);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Edit Data</title>

  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <script type="text/javascript">
    $(document).ready(function(){
      // alert('test');
      show_jurusan();

      function show_jurusan(){
        $.ajax({
          type  : 'GET',
          url   : 'api.php',
          async : false,
          dataType  : 'json',
          success : function(data){
            console.log(data);
            var html = '';
            var i;
            var no;
            html += '<option value="<?= $isiAnggota['jurusan'] ?>"><?= $isiAnggota['jurusan'] ?></option>';
            for (i=0; i<data.length; i++){
              no = i + 1;
              html +=
                '<option value="'+data[i].jurusan+'">'+data[i].jurusan+'</option>';
            }
            $('#jurusan').html(html);
          },
          error:function(data){
            console.log(data);
          }
        });
      }

  });  
  </script>


  <section id="features" class="features">
    <div class="container" data-aos="fade-up">
      <div class="section-title text-center">
        <h2>Edit Data</h2>
      </div>
      <div class="container">
        <row>
          <div class="card">
            <div class="card-body">
              <form class="row g-3" method="post" action="<?php echo $ctrl->updateData($id);?>" name="form1">
                <div class="col-md-12">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $isiAnggota['id'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="nim" class="form-label">NIM</label>
                  <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $isiAnggota['nim'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $isiAnggota['nama'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="no_hp" class="form-label">NO HP</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $isiAnggota['no_hp'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $isiAnggota['alamat'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select id="jurusan" class="form-select" name="jurusan" required>
                      <option selected>Masukan Pilihan</option>
                    </select>
                </div>
                <div class="col-md-6">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <select id="jabatan" class="form-select" name="jabatan">
                    <option selected>Masukan Pilihan</option>
                    <?php
                    foreach ($query3 as $jabatan) {
                      if ($jabatan['jabatan'] == $isiAnggota['jabatan']) {
                    ?>
                        <option selected value="<?= $jabatan['jabatan'] ?>"><?php echo $jabatan['jabatan'] ?></option>
                      <?php
                      }
                      ?>
                      <option value="<?= $jabatan['jabatan'] ?>"><?= $jabatan['jabatan'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="d-grid gap-2 d-md-block">
                  <button type="submit" class="btn btn-success" name="update">Update</button>
                  <a href="content.php" class="btn btn-outline-danger" name="batal">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </row>
      </div>
      <?php
      if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $jurusan = $_POST['jurusan'];
        $jabatan = $_POST['jabatan'];

        $result = mysqli_query($con, "UPDATE `tbl_anggota` SET
    `nim`='$nim',
    `nama`='$nama',
    `no_hp`='$no_hp',
    `alamat`='$alamat',
    `jurusan`='$jurusan',
    `jabatan`='$jabatan'
    WHERE
    `id`='$id'");

        // var_dump($id);
        // die;
        if (isset($_POST['update'])) {
          echo "<script>window.location.href='content.php?pesan=success&frm=edit';</script>";
          header("Location:content.php?pesan=success&&frm=edit");
          exit;
        }
      }
      ?>

</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>