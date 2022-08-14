<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['UsuariosActive'] = 'active';
		$this->data['configOpen'] = 'open';
		$this->data['configExpand'] = 'true';
		$this->data['view'] = 'usuarios/usuarios';
		$this->load->view('main',$this->data);
	}
}