  <?php
error_reporting(0);
include '../controller/Anggota.php';

$ctrl = new Anggota();
/*$query2 = $ctrl->getJenisData($id);*/
$query3 = $ctrl->getJenisData2($id);


// $query = mysqli_query($con, "SELECT * FROM tbl_jurusan");
// $query2 = mysqli_query($con, "SELECT * FROM tbl_jabatan");
// $result = $con->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Anggota</title>
  <!-- <link rel="stylesheet" href="../asset/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

    /*$('#ModalJenis').modal('hide');
    var dataForm = $('#formJenisSurat').serialize();
    $.ajax({
    type  : 'POST',
    url   : 'api.php',//Memanggil Controller/Function
    async : false,
    dataType : 'json',
    data : dataForm, 
    success:function(response){
            if (response == 200) {
          Swal.fire({
          type: 'success',
          title: 'Berhasil di simpan!',
          text: 'Tunggu sejenak',
          timer: 1000,
          showCancelButton: false,
          showConfirmButton: false
          })
          .then (function() {
            show_jenis();
          });

            } else {

                Swal.fire({
                type: 'error',
                title: 'Gagal menyimpan',
                text: 'silahkan coba lagi!'
              });

            }

            console.log(response);

          },

          error:function(response){

              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });

              console.log(response);

          }
    });*/

  });  
  </script>
  <div class="container">
    <row>
      <div class="card">
        <h2 align="center">Tambah Anggota</h2>
        <div class="card-body">
          <form class="row g-3" method="post" action="<?php echo $ctrl->simpanData();?>" name="form1">
            <div class="col-md-6">
              <label for="noSurat" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="col-md-6">
              <label for="no_hp" class="form-label">NO HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <div class="col-md-5">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select id="jurusan" class="form-select" name="jurusan" required>
                <option selected>Masukan Pilihan</option>
              </select>
            </div>
            <div class="col-md-1 pt-2">

              <a href="#" class="btn btn-outline-warning mt-4" data-bs-toggle="modal" data-bs-target="#modalData" ><i class="bi bi-plus"></i></a>
            </div>
            <div class="col-md-6">
              <label for="jabatan" class="form-label">Jabatan</label>
              <select id="jabatan" class="form-select" name="jabatan" required>
                <option selected>Masukan Pilihan</option>
                <?php
                foreach ($query3 as $jabatan) {
                ?>
                  <option value="<?= $jabatan['jabatan'] ?>"><?= $jabatan['jabatan'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="d-grid gap-2 d-md-block">
              <button type="submit" class="btn btn-success" name="simpan">Add</button>
              <a href="content.php" class="btn btn-outline-danger" name="batal">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </row>
  </div>
  <div class="example-modal">
        <div id="modalData" class="modal fade" role="dialog" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="#" method="POST" id="formJurusan">
                <div class="modal-header">
                  <h3 class="modal-title">Tambah Jurusan</h3>
                </div>
                <div class="modal-body">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <input type="text" class="form-control" id="jurusanInput" name="jurusanInput" placeholder="Jurusan">
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="btnSimpan">Simpan</button>
                    <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  
</body>

<script>
  $('#formJurusan').on('submit',function(e){
    e.preventDefault();
    let jurusan = $("#jurusanInput").val();

    $.ajax({
      url: 'api.php',
      type: 'POST',
      data: {
        jurusan: jurusan,
      },
      dataType: 'json',
      success: function(data){
        alert("Berhasil");
        location.reload();
      },
      error: function(data){
        console.log(data)
      }
    });
  });
</script>

<!-- <script src="../asset/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>