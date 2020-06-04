<?php  
class Education_model extends CI_Model {

	public function get($nim = null)
    {
        $this->db->from('education');
        if ($nim != null)
            $this->db->where('nim', $nim);
        $query = $this->db->get()->row();
        return $query;
    }

        public function insert_data($nim, $jenjang_pendidikan1, $tahun1, $deskripsi1, $jenjang_pendidikan2, $tahun2, $deskripsi2, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		array(
        		'nim'					=> $nim,
		        'jenjang_pendidikan'	=> $jenjang_pendidikan1,
				'tahun'					=> $tahun1,
				'deskripsi'				=> $deskripsi1,
				'bukti_pendukung'		=> $bukti_pendukung,
				'status'				=> $status,
				'tanggal_disetujui' 	=> $tanggal_disetujui
				),
        		array(
        		'nim'					=> $nim,
		        'jenjang_pendidikan'	=> $jenjang_pendidikan2,
				'tahun'					=> $tahun2,
				'deskripsi'				=> $deskripsi2,
				'bukti_pendukung'		=> $bukti_pendukung,
				'status'				=> $status,
				'tanggal_disetujui' 	=> $tanggal_disetujui
				)	
			);


            $this->db->insert_batch('education', $data);
        }
}