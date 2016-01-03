<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function index()
	{
		$this->load->view('add');
	}

	public function add_book_and_review()
	{	
		$result = $this->book->add_book($this->input->post());

		if($result)
		{
			$this->session->set_flashdata('message', "success");
			redirect("/Reviews/index");
		}
		else
		{
			$this->session->set_flashdata('message', "please try again");
			redirect("/Reviews/index");
		}
	}

	public function get_book($id)
	{

		$book = $this->review->get_book_info($id);
		$review = $this->review->get_review_by_book($id);
		$this->load->view('book-main', array('book' => $book, 'review' => $review));
	}

	public function add_review()
	{
		$review = $this->review->create_review($this->input->post());
		if($review)
		{
		$id = $this->input->post('book_id');
			$this->session->set_flashdata('message', "Book added successfully!");
		redirect("/Reviews/get_book/" . $id);
		}
		else
		{
		$this->session->set_flashdata('message', "please try again");
		redirect("book-main");	
		}

	}
	public function delete_review()
	{
		$delete = $this->review->delete_review($this->input->post());
		if($delete)
		{
		$id = $this->input->post('book_id');
			$this->session->set_flashdata('message', "Your review has been deleted!");
		redirect("/Reviews/get_book/" . $id);
		}
		else
		{
		$this->session->set_flashdata('message', "please try again");
		redirect("book-main");	
		}
	}
}