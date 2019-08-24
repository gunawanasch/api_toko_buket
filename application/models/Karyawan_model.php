<?php
class Karyawan_model extends CI_Model {

	function getLogin($email, $password) {
		$this->load->database();
		$this->db->select("id_karyawan, nama, id_jabatan");
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$query = $this->db->get("karyawan");
		$result = $query->result();
		return $result;
	}

	function getDetailKaryawan($id_karyawan) {
		$this->load->database();
		$query = $this->db->query("select k.nama, k.alamat, k.no_telp, k.email, j.nama from karyawan k, jabatan j where k.id_jabatan = j.id_jabatan and k.id_karyawan = ".$id_karyawan."");
		$result = $query->result();
		return $result;
	}

	function getSales() {
		$this->load->database();
		$query = $this->db->query("select k.nama, k.alamat, k.no_telp, k.email, k.foto, j.jabatan, from karyawan k, jabatan j where k.id_jabatan = j.id_jabatan and j.nama = 'Sales'");
		$result = $query->result();
		return $result;
	}

	function editKaryawan($id_karyawan, $nama, $alamat, $no_telp, $email) {
		$data = array(
        	'nama' => $nama,
        	'alamat' => $alamat,
        	'no_telp' => $no_telp,
        	'email' => $email
		);

		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->update('karyawan', $data);
	}

	function deleteKaryawan($id_karyawan) {
		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->delete('karyawan');
	}
	
}
?>