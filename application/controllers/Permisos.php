<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

	public function index()
	{
		if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['PermisosActive'] = 'active';
		$this->data['configOpen'] = 'open';
		$this->data['configExpand'] = 'true';
		$this->data['view'] = 'permisos/permisos';
		$this->load->view('main',$this->data);
	}
}