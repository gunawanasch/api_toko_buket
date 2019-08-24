<?php
class Karyawan_controller extends CI_Controller {
		
	function getLogin() {
		//http://localhost/api_toko_buket/index.php/Karyawan_controller/getLogin
		$email 		= $this->input->post("email");
		$password 	= $this->input->post("password");
		$this->load->model("Karyawan_model");
		$data_user = $this->Karyawan_model->getLogin($email, md5($password));
		if(sizeof($data_user) > 0) {
			$result = array("status" 		=> 1, 
							"id_karyawan" 	=> $data_user[0]->id_karyawan,
							"nama"			=> $data_user[0]->nama,
							"id_jabatan" 	=> $data_user[0]->id_jabatan);
		}
		else {
			$result = array("status" 		=> 0, 
							"id_karyawan" 	=> "",
							"nama" 			=> "",
							"id_jabatan" 	=> "");
		} 
		echo json_encode($result);
	}

}
?>