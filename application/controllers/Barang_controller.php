<?php
class Barang_controller extends CI_Controller {
		
	function getBarang() {
		//http://localhost/api_toko_buket/index.php/Barang_controller/getBarang
		$id_karyawan = $this->input->post("id_karyawan");
		$this->load->model("Karyawan_model");
		$data_karyawan = $this->Karyawan_model->getDetailKaryawan($id_karyawan);
		if(sizeof($data_karyawan) > 0) {
			$this->load->model("Barang_model");
			$result = $this->Barang_model->getBarang();
			echo json_encode($result);
		}
		else {
			echo json_encode($data_karyawan);
		}
	}

}
?>