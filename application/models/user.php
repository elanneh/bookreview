<?php

class user extends CI_Model {

  function get_user_data($id)
    {
        return $this->db->query("SELECT * FROM users JOIN reviews ON users.id = reviews.user_id JOIN books ON reviews.book_id = books.id WHERE users.id = ?", array($id))->result_array();
    }
     function get_user_by_email($email)
     {
         return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
     }
     function get_user_id($email)
     {
        return $this->db->query("SELECT id FROM users WHERE email = ?", array($email))->row_array(); 
     }
     function login_user($post)
     {
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('message', validation_errors());
            redirect("/");
        }
        else
        {            
            $query = "SELECT * FROM users WHERE email = ? AND password = ?";  
            $values = array($post['email'],$post['password']); 
            return $this->db->query($query, $values)->row_array();
        }
    }    
     function add_user($user)
     {
        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("alias", "Alias", "required");
        $this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Password", "required|min_length[8]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('message', validation_errors());
        }
        else
        {
         $query = "INSERT INTO users (name, alias, email, password) VALUES (?,?,?,?)";
         $values = array($user['name'], $user['alias'], $user['email'],$user['password']); 
         return $this->db->query($query, $values);

         }
     }

     
}
?>