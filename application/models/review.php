<?php

class review extends CI_Model {

    function get_all_reviews()
    {
        return $this->db->query("SELECT reviews.id, reviews.content, reviews.rating, reviews.created_at, reviews.book_id, reviews.user_id, books.title, books.author, users.name, users.alias, users.email FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON reviews.user_id = users.id ORDER BY created_at DESC")->result_array();
    }
    function get_book_info($id)
    {
        $query = "SELECT id, title, author FROM books WHERE books.id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->row_array();
    }

    function get_review_by_book($id)
    {
        $query = "SELECT books.id, books.title, books.author, reviews.id, reviews.content, reviews.rating, reviews.created_at, reviews.user_id, users.name FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON reviews.user_id = users.id WHERE books.id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }

    function create_review($post)
    {
        $query = "INSERT INTO reviews (content, rating, book_id, user_id, created_at, updated_at) VALUES (?,?,?,?,NOW(), NOW())";
        $values = array($post['content'], $post['rating'], $post['book_id'], $this->session->userdata('id')); 
      return $this->db->query($query, $values);
    }     

    function delete_review($id)
    {
        $query = "DELETE FROM reviews WHERE id = ?";
        $values = $id;
        return $this->db->query($query, $values);
    }
}
?>