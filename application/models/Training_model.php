<?php  
class Training_model extends CI_Model {

	public function insert_data($nim, $nama_training, $sebagai, $tahun, $bukti_pendukung, $status, $tanggal_disetujui)
	{
		$data = array(
			'nim'				=> $nim,
			'nama_training'		=> $nama_training,
			'sebagai'			=> $sebagai,
			'tahun'				=> $tahun,
			'bukti_pendukung'	=> $bukti_pendukung,
			'status'			=> $status,
			'tanggal_disetujui' => $tanggal_disetujui
		);
		$this->db->insert('training', $data);
	}
}