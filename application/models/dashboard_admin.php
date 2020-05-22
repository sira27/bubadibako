<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_model 
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $post['email']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null)
            $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
}
?>