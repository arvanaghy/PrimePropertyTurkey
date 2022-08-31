<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

	public function index()
	{
		$this->load->view('web/index');
	}
	
	public function about_us()
	{
		$this->load->view('web/about-us');
	}
		
	public function plan()
	{
		$this->load->view('web/plan');
	}
	
	public function contact_us()
	{
		$this->load->view('web/contact-us');
	}
	
	public function login()
	{
		$this->load->view('web/login');
	}
	
	public function register()
	{
		$this->load->view('web/register');
	}
	
	public function forget_password()
	{
		$this->load->view('web/forget-password');
	}
	
}
