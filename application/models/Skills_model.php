<?php  
class Skills_model extends CI_Model {

	public function get($nim = null)
    {
        $this->db->from('skill');
        if ($nim != null)
            $this->db->where('nim', $nim);
        $query = $this->db->get()->row();
        return $query;
    }

        public function insert_data($nim, $jenis_skill, $nama_skill, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'				=> $nim,
		        'jenis_skill'		=> $jenis_skill,
				'nama_skill'		=> $nama_skill,
				'bukti_pendukung'	=> $bukti_pendukung,
				'status'			=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('skill', $data);
        }
}