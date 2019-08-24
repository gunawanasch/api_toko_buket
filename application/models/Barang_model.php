<?php
class Barang_model extends CI_Model {

	function getBarang() {
		$this->load->database();
		$this->db->select("id_barang, nama, harga, foto");
		$query = $this->db->get("barang");
		$result = $query->result();
		return $result;
	}
	
}
?>