<?php  
class Student_model extends CI_Model {

        public function insert_entry($sa, $du, $ti, $em, $li, $sep, $en, $tu, $de, $se)
        {
        	$data = array(
		        'nim'			=> $sa,
				'nama'			=> $du,
				'tempat_lahir'	=> $ti,
				'tanggal_lahir'	=> $em,
				'agama'			=> $li,
				'status'		=> $sep,
				'alamat'		=> $en,
				'email'			=> $tu,
				'deskripsi_diri'=> $de,
				'foto'			=> $se
			);
            $this->db->insert('nim_mahasiswa', $data);
        }
}