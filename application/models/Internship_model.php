<?php  
class Internship_model extends CI_Model {

        public function insert_data($nim, $tempat_kerja, $posisi_kerja, $tahun, $deskripsi_kegiatan, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'				=> $nim,
		        'tempat_kerja'		=> $tempat_kerja,
				'posisi_kerja'		=> $posisi_kerja,
				'tahun'				=> $tahun,
				'deskripsi_kegiatan'=> $deskripsi_kegiatan,
				'bukti_pendukung'	=> $bukti_pendukung,
				'status'			=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('internship', $data);
        }
}