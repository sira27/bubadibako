<?php  
class Student_model extends CI_Model {

        public function insert_entry($sa, $du, $ti, $em, $li, $en, $tu, $de, $se, $sep)
        {
        	$data = array(
		        'nim'			=> $sa,
				'nama'			=> $du,
				'tempat_lahir'	=> $ti,
				'tanggal_lahir'	=> $em,
				'agama'			=> $li,
				'alamat'		=> $en,
				'email'			=> $tu,
				'deskripsi_diri'=> $de,
				'foto'			=> $se,
				'status'		=> $sep
			);
            $this->db->insert('nim_mahasiswa', $data);
        }
}