<?php
class Pemesanan_controller extends CI_Controller {

	function addPemesanan() {
		//http://localhost/api_toko_buket/index.php/Pemesanan_controller/addPemesanan
		$id_karyawan = $this->input->post("id_karyawan");
		$id_pelanggan = $this->input->post("id_pelanggan");
		$id_barang = $this->input->post("id_barang");
		$jumlah_barang = $this->input->post("jumlah_barang");
		$total_harga = $this->input->post("total_harga");
		$this->load->model("Pemesanan_model");
		$id_pemesanan = $this->Pemesanan_model->addPemesanan($id_karyawan, $id_pelanggan);
		if($id_pemesanan > 0) {
			for($i=0; $i<sizeof($id_barang); $i++) {
				$this->Pemesanan_model->addDetailPemesanan($id_pemesanan, $id_barang[$i], $jumlah_barang[$i], $total_harga[$i]);
		 	}
			$result = array('status' => 1, 
							'message' => "Data pemesanan berhasil dikirim");
		}
		else {
			$result = array("status" 	=> 0, 
							"message" 	=> "Data pemesanan gagal dikirim");
		}
		echo json_encode($result);
	}

	function getTotalPenjualanByDate() {
		//http://localhost/api_toko_buket/index.php/Pemesanan_controller/getTotalPenjualanByDate
		$id_karyawan = $this->input->post("id_karyawan");
		$from_date = $this->input->post("from_date");
		$to_date = $this->input->post("to_date");
		$this->load->model("Pemesanan_model");
		$result = $this->Pemesanan_model->getTotalPenjualanByDate($id_karyawan, $from_date, $to_date);
		echo json_encode($result);
	}

}
?>