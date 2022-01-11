<?php

class Anggota_model{
	
	protected $db;
	function __construct($db){
		$this->db = $db;
	}

	function tampil_data(){
		$row = $this->db->prepare("SELECT*FROM `tbl_anggota`");
		$row->execute();
		return $hasil = $row->fetchAll();
	}
	function getData($id){
		$row = $this->db->prepare("SELECT * FROM tbl_anggota where id = $id");
		$row->execute();
		return $hasil = $row->fetch();
	}
	function getJenisData(){
		$row = $this->db->prepare("SELECT * FROM tbl_jurusan");
		$row->execute();
		return $hasil = $row->fetchAll();
	}
	function getJenisData2(){
		$row = $this->db->prepare("SELECT * FROM tbl_jabatan");
		$row->execute();
		return $hasil = $row->fetchAll();
	}
	function simpanDataJurusan($data){
		//buat array untuk isi value insert sumber kode
		$rowsSQL = array();
		//buat untuk param prepared Statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom/values
		foreach ($data as $arrayIndex => $row) {
			$params = array();
			foreach($row as $columnName => $columnValue){
				$param = ":". $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
			}
			$rowsSQL[] = "(".implode(", ", $params).")";
		}
		$sql = "INSERT INTO tbl_jurusan (" . implode(", ", $columnNames) . ") VALUES" .implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind our values.
		foreach($toBind as $param => $val){
			$row ->bindValue($param, $val);
		}
		return $row->execute();
	}
	function simpanData($data){
		//buat array untuk isi value insert sumber kode
		$rowsSQL = array();
		//buat untuk param prepared Statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom/values
		foreach ($data as $arrayIndex => $row) {
			$params = array();
			foreach($row as $columnName => $columnValue){
				$param = ":". $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
			}
			$rowsSQL[] = "(".implode(", ", $params).")";
		}
		$sql = "INSERT INTO tbl_anggota (" . implode(", ", $columnNames) . ") VALUES" .implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind our values.
		foreach($toBind as $param => $val){
			$row ->bindValue($param, $val);
		}
		return $row->execute();
	}
	function updateData($data, $id){
		$setPart = array();
		foreach ($data as $key => $value) {
			$setPart[] = $key."=:".$key;
		}
		$sql = "UPDATE tbl_anggota SET ".implode(',', $setPart)." WHERE id = :id";
		$row = $this->db->prepare($sql);
		//bind our values
		$row->bindValue(':id',$id); //where
		foreach ($data as $param => $val) {
			$row->bindValue($param,$val);
		}
		return $row->execute();
	}
	function hapusData($id){
		$sql = "DELETE FROM tbl_anggota WHERE id = ?";
		$row = $this->db->prepare($sql);
		return $row ->execute(array($id));
	}
}
?>