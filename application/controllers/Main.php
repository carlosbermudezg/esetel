<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['InicioActive'] = 'active';
		$this->data['view'] = 'inicio';
		$this->load->view('main',$this->data);
	}
}