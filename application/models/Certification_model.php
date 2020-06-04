<?php  
class Certification_model extends CI_Model {

	public function get($id = null)
    {
        $this->db->from('professional_certification');
        if ($id != null)
            $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

        public function insert_data($nim, $nama_kegiatan, $deskripsi_kegiatan, $tahun, $bukti_pendukung, $status, $tanggal_disetujui)
        {
        	$data = array(
        		'nim'				=> $nim,
		        'nama_kegiatan'		=> $nama_kegiatan,
				'deskripsi_kegiatan'=> $deskripsi_kegiatan,
				'tahun'				=> $tahun,
				'bukti_pendukung'	=> $bukti_pendukung,
				'status'			=> $status,
				'tanggal_disetujui' => $tanggal_disetujui
			);
            $this->db->insert('professional_certification', $data);
        }
}