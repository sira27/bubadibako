<?php  
class Training_model extends CI_Model {

	public function get($id = null)
    {
        $this->db->from('training');
        if ($id != null)
            $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

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