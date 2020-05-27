<?php  
class Achievement_model extends CI_Model {

        public function insert_data($nim, $nama_pencapaian, $tahun, $deskripsi_pencapaian, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'					=> $nim,
		        'nama_pencapaian'		=> $nama_pencapaian,
				'tahun'					=> $tahun,
				'deskripsi_pencapaian'	=> $deskripsi_pencapaian,
				'bukti_pendukung'		=> $bukti_pendukung,
				'status'				=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('achievement', $data);
        }
}