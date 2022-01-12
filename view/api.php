<?php
	header("Access-Control-Allow-Origin:*");
	header("Content-Type:application/json;charset=UTF-8");
	header("Access-Control-Allow-Methods:POST,GET,PUT,DELETE");
	header("Access-Control-Max-Age:3600");
	header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

	include'../controller/Anggota.php';
	$ctrl = new Anggota();
	$request = $_SERVER['REQUEST_METHOD'];
	switch ($request) {
		case 'GET':
			$ctrl->getJenisData();
			break;

			case 'POST';
			$ctrl->simpanJurusan();
			break;

			case 'PUT';
			break;
			
			case 'DELETE';
			break;
		
		default:
			http_response_code(404);
			echo "request tidak diizinkan";
	}
?>