<?php

class book extends CI_Model {

    function get_all_books()
    {
        return $this->db->query("SELECT * FROM books ORDER BY created_at DESC")->result_array();
    }

    function get_book_by_id($id)
    {
        $query = "SELECT * FROM books WHERE id = ?";
        $value = array($id);
        return $this->db->query($query, $value)->row_array();

    }
         
    function add_book($post)
    {
        $this->form_validation->set_rules("title", "Book Title", "required");
        $this->form_validation->set_rules("author", "Author", "required");
        $this->form_validation->set_rules("content", "Review", "required");
        $this->form_validation->set_rules("rating", "Rating", "required");
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('message', validation_errors());
        }
        else
        {
   
        $query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
        $values = array($post['title'], $post['author']); 
        $this->db->query($query, $values);

        $book_id = $this->db->insert_id();

        $query2 = "INSERT INTO reviews (content, rating, book_id, user_id, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array($post['content'], $post['rating'], $book_id, $this->session->userdata['id']); 
        $this->db->query($query2, $values);
        return true;
        
        }
    }
     
}
?>