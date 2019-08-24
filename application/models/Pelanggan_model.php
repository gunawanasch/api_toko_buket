<?php
class Pelanggan_model extends CI_Model {

	function getPelanggan() {
		$this->load->database();
		$this->db->select("id_pelanggan, nama, no_telp, alamat");
		$query = $this->db->get("pelanggan");
		$result = $query->result();
		return $result;
	}

	function getPelangganByNama($nama) {
		$this->load->database();
		$this->db->select("id_pelanggan, nama, no_telp, alamat");
		$this->db->where("nama", $nama);
		$query = $this->db->get("pelanggan");
		$result = $query->result();
		return $result;
	}

	function getDetailPelanggan($id_pelanggan) {
		$this->load->database();
		$this->db->select("id_pelanggan, nama, no_telp, alamat");
		$this->db->where("id_pelanggan", $id_pelanggan);
		$query = $this->db->get("pelanggan");
		$result = $query->result();
		return $result;
	}

	function addPelanggan($nama, $no_telp, $alamat) {
		$this->load->database();
		$this->db->set("nama", $nama);
		$this->db->set("no_telp", $no_telp);
		$this->db->set("alamat", $alamat);
		$this->db->insert("pelanggan");
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
	}

	function editPelanggan($id_pelanggan, $nama, $no_telp, $alamat) {
		$this->load->database();
		$data = array("nama" 	=> $nama,
					  "no_telp" => $no_telp,
        			  "alamat" 	=> $alamat);
		$this->db->where("id_pelanggan", $id_pelanggan);
		$this->db->update("pelanggan", $data);
	}
	
}
?>