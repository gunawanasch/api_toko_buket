<?php
class Pelanggan_controller extends CI_Controller {
		
	function getPelanggan() {
		//http://localhost/api_toko_buket/index.php/Pelanggan_controller/getPelanggan
		$id_karyawan = $this->input->post("id_karyawan");
		$this->load->model("Karyawan_model");
		$data_karyawan = $this->Karyawan_model->getDetailKaryawan($id_karyawan);
		if(sizeof($data_karyawan) > 0) {
			$this->load->model("Pelanggan_model");
			$result = $this->Pelanggan_model->getPelanggan();
			echo json_encode($result);
		}
		else {
			echo json_encode($data_karyawan);
		}
	}

	function getPelangganByNama() {
		//http://localhost/api_toko_buket/index.php/Pelanggan_controller/getPelangganByNama
		$nama = $this->input->post("nama");
		$this->load->model("Pelanggan_model");
		$result = $this->Pelanggan_model->getPelangganByNama($nama);
		echo json_encode($result);
	}

	function getDetailPelanggan() {
		//http://localhost/api_toko_buket/index.php/Pelanggan_controller/getDetailPelanggan
		$id_pelanggan = $this->input->post("id_pelanggan");
		$this->load->model("Pelanggan_model");
		$data = $this->Pelanggan_model->getDetailPelanggan($id_pelanggan);
		if(sizeof($data) > 0) {
			$result = array("status" 		=> 1, 
							"id_pelanggan" 	=> $data[0]->id_pelanggan,
							"nama"			=> $data[0]->nama,
							"no_telp" 		=> $data[0]->no_telp,
							"alamat" 		=> $data[0]->alamat);
		}
		else {
			$result = array("status" 		=> 0, 
							"id_pelanggan" 	=> "",
							"nama" 			=> "",
							"np_telp" 		=> "",
							"alamat" 		=> "");
		} 
		echo json_encode($result);
	}

	function addPelanggan() {
		//http://localhost/api_toko_buket/index.php/Pelanggan_controller/addPelanggan
		$nama 			= $this->input->post("nama");
		$no_telp 		= $this->input->post("no_telp");
		$alamat 		= $this->input->post("alamat");
		$this->load->model("Pelanggan_model");
		$sql = $this->Pelanggan_model->addPelanggan($nama, $no_telp, $alamat);
		if($sql == TRUE) {
			$result = array("status"	=> 1, 
							"message" 	=> "Data berhasil disimpan");
		}
		else {
			$result = array("status" 	=> 0, 
							"message" 	=> "Data gagal disimpan");
		}
		echo json_encode($result);
	}

	function editPelanggan() {
		//http://localhost/api_toko_buket/index.php/Pelanggan_controller/editPelanggan
		$id_pelanggan	= $this->input->post("id_pelanggan");
		$nama 			= $this->input->post("nama");
		$no_telp 		= $this->input->post("no_telp");
		$alamat 		= $this->input->post("alamat");
		$this->load->model("Pelanggan_model");
		$this->Pelanggan_model->editPelanggan($id_pelanggan, $nama, $no_telp, $alamat);
		$result = array("status" 	=> 1, 
						"message" 	=> "Data berhasil diubah");
		echo json_encode($result);
	}

}
?>