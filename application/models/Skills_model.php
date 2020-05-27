<?php  
class Skills_model extends CI_Model {

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