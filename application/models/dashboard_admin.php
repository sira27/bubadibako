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

    public function add($post)
    {
        $params['nim'] = $post['induk'];
        $params['name'] = $post['fullname'];
        $params['email'] = $post['email'];
        $params['image'] = 'default.jpg';
        $params['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        // $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['role_id'] = $post['role'];
        $params['is_active'] = 1;
        $params['date_created'] = time();
        $this->db->insert('user', $params);
    }

    public function add_dosen($post, $id)
    {
        $params['id'] = $id;
        $params['nidn'] = $post['induk'];
        $params['name'] = $post['fullname'];
        $params['email'] = $post['email'];

        $this->db->insert('dosen', $params);
    }

    public function select_id($post)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('nim', $post['induk']);
        $query = $this->db->get();
        return $query;   
    }

    public function edit($post)
    {
        $params['nim'] = $post['induk'];
        $params['name'] = $post['fullname'];
        $params['email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }
        // $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['role_id'] = $post['role'];
        $this->db->where('id', $post['id']);
        $this->db->update('user', $params);
    }

    public function delete($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('user');
	}
}
?>