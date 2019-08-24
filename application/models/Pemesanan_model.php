<?php
class Pemesanan_model extends CI_Model {

	function addPemesanan($id_karyawan, $id_pelanggan) {
		$this->load->database();
		$this->db->set("tgl_pemesanan", date("Y-m-d H:i:s"));
		$this->db->set("id_karyawan", $id_karyawan);
		$this->db->set("id_pelanggan", $id_pelanggan);
		$this->db->insert("pemesanan");
		// return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
		if($this->db->affected_rows() > 0) {
			return $id = $this->db->insert_id();
		}
		else {
			return 0;
		}
		
	}

	function addDetailPemesanan($id_pemesanan, $id_barang, $jumlah_barang, $total_harga) {
		$this->load->database();
		$this->db->set("id_pemesanan", $id_pemesanan);
		$this->db->set("id_barang", $id_barang);
		$this->db->set("jumlah_barang", $jumlah_barang);
		$this->db->set("total_harga", $total_harga);
		$this->db->insert("detail_pemesanan");
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
	}

	function getTotalPenjualanByDate($id_karyawan, $from_date, $to_date) {
		$this->load->database();
		$query = $this->db->query("select p.id_pemesanan, p.tgl_pemesanan, p.id_pelanggan, sum(dp.jumlah_barang) jml_barang from pemesanan p, detail_pemesanan dp where p.id_karyawan = ".$id_karyawan." and date_format(p.tgl_pemesanan, '%Y-%m-%d') >= str_to_date('".$from_date."', '%Y-%m-%d') and date_format(p.tgl_pemesanan, '%Y-%m-%d') <= str_to_date('".$to_date."', '%Y-%m-%d') and p.id_pemesanan = dp.id_pemesanan group by p.id_pemesanan");
		$result = $query->result();
		return $result;
	}
	
}
?>