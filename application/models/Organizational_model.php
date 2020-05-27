<?php  
class Organizational_model extends CI_Model {

        public function insert_data($nim, $nama_organisasi, $jabatan_organisasi, $tahun, $deskripsi_kegiatan, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'				=> $nim,
		        'nama_organisasi'	=> $nama_organisasi,
				'jabatan_organisasi'=> $jabatan_organisasi,
				'tahun'				=> $tahun,
				'deskripsi_kegiatan'=> $deskripsi_kegiatan,
				'bukti_pendukung'	=> $bukti_pendukung,
				'status'			=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('organizational', $data);
        }
}