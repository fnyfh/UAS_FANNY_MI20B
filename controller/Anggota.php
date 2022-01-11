<?php

include '../Database.php';
include '../model/Anggota_model.php';

class Anggota {
	public $model;

	function __construct(){
		$db = new Database();
		$conn = $db->DBConnect();
		$this->model = new Anggota_model($conn);
	}

	function index(){
		session_start();

		if (!empty($_SESSION)) {
			$hasil = $this->model->tampil_data();
			return $hasil;
		}else{
			header("Location:index.php");
		}
	}
	function getData($id){
		$hasil = $this->model->getData($id);
	return $hasil;
	}
	function getJenisData(){
		$hasil = $this->model->getJenisData();
	echo json_encode($hasil);
	}
	function getJenisData2(){
		$hasil = $this->model->getJenisData2();
	return $hasil;
	}
	function hapusData(){
		if (isset($_POST['delete'])) {
			$id = $_POST['id'];
			$result = $this->model->hapusData($id);

			if ($result) {
				header("Location:content.php?pesan=success&frm=del");
			}else{
				header("Location:content.php?pesan=gagal&frm=del");
			}
		}
	}
	function simpanData(){
		if(isset($_POST['simpan'])){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$noHp = $_POST['no_hp'];
			$alamat = $_POST['alamat'];
			$jurusan = $_POST['jurusan'];
			$jabatan = $_POST['jabatan'];

			$data[] = array(
				'nim' => $nim,
				'nama' => $nama,
				'no_hp' => $noHp,
				'alamat' => $alamat,
				'jurusan' => $jurusan,
				'jabatan' => $jabatan,
			);

			$result = $this->model->simpanData($data);

			if ($result) {
				header("Location:content.php?pesan=success&frm=add");
			}else{
				header("Location:content.php?pesan=gagal&frm=add");
			}
		}
	}
	function updateData($id){
		if(isset($_POST['update'])){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$noHp = $_POST['no_hp'];
			$alamat = $_POST['alamat'];
			$jurusan = $_POST['jurusan'];
			$jabatan = $_POST['jabatan'];

			$data = array(
				'nim' => $nim,
				'nama' => $nama,
				'no_hp' => $noHp,
				'alamat' => $alamat,
				'jurusan' => $jurusan,
				'jabatan' => $jabatan,
			);

			$result = $this->model->updateData($data, $id);

			if ($result) {
				header("Location:content.php?pesan=success&frm=edit");
			}else{
				header("Location:content.php?pesan=gagal&frm=edit");
			}
		}
	}
	function Logout(){
		if (isset($_POST['logout'])) {
			session_start();
			session_destroy();
			header("Location:index.php?pesan=success&&frm=logout");
		}
	}
	function simpanJurusan(){
		$jurusan = $_POST['jurusan'];
		$data[] = array(
			'jurusan' => $jurusan,
		);
		$add = $this->model->simpanDataJurusan($data);
		$result['status']=1;
      	echo json_encode($result);
	}
}

?>