<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('main');
	}

	public function register()
	{
		$register = $this->user->add_user($this->input->post());
		if(isset($register))
		{
			 $this->session->set_flashdata('message', 'Thanks for registering! You may now login');
			 redirect("/");
		}
		else{
			$this->session->set_flashdata('message', 'Uh-oh. Please try again');
			redirect("/");
		}
	}

	public function login()
	{
		$login_user = $this->user->login_user($this->input->post());
	
		if(isset($login_user))
		{
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('name', $login_user['name']);
			$this->session->set_userdata('alias', $login_user['alias']);
			$this->session->set_userdata('email', $login_user['email']);
			$this->session->set_userdata('id', $login_user['id']);
			
			redirect("/Users/welcome");
		}
		else
		{
			$this->session->set_flashdata('message', 'Uh-oh. Please try again');
			redirect("/Users/index");
		}
	}

	public function welcome()
	{	
		$reviews = $this->review->get_all_reviews();
		$this->load->view('users-main', array('reviews' => $reviews));
		$this->load->view('/partials/partials-book', array('reviews' => $reviews));
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect("/");
	}

	public function view_user($id)
	{
		$user = $this->user->get_user_data($id);
		$this->load->view('users-profile', array('user' => $user));
	}
}
?>