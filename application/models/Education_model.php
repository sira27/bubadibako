<?php  
class Education_model extends CI_Model {

        public function insert_data($nim, $jenjang_pendidikan, $tahun, $deskripsi, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'					=> $nim,
		        'jenjang_pendidikan'	=> $jenjang_pendidikan,
				'tahun'					=> $tahun,
				'deskripsi'				=> $deskripsi,
				'bukti_pendukung'		=> $bukti_pendukung,
				'status'				=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('education', $data);
        }
}