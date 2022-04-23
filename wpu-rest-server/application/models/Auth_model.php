<?php

class Auth_model extends CI_Model
{
    public function getUser($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
        
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out
            </div>');
    }

    public function updatePassword($data, $id)
    {
        $this->db->set('password', $data);
        $this->db->where('id', $id);
        $this->db->update('user');
        return $this->db->affected_rows();
    }
}