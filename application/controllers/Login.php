<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
		parent::__construct();
	}

	public function index(){
	  if(($this->session->userdata('conectado'))){
	    redirect('main');
	  }
	  if($this->input->post('login-username') && $this->input->post('login-password')){
	    if($this->General_model->login($this->input->post('login-username'),md5($this->input->post('login-password'))) == TRUE){
	      redirect('main');
	    }else{
	      $this->session->set_flashdata('msg',$this->lang->line('incorrect_login'));
	      $this->session->set_flashdata('onload','onload="snackbarF()"');
	      $this->session->set_flashdata('bg-color','bg-danger');
	      redirect('Login');
	    }
	  }
	 $this->load->view('login');
	}
	public function logout(){
	  $this->General_model->logout($this->session->userdata('id'));
	  $datos = array(
            'id' => '',
            'user' => '',
            'nombre' => '',
            'email' => '',
            'telefono' => '',
            'id_permiso' => '',
            'conectado' => FALSE
      );
      $this->session->unset_userdata($datos);
      $this->session->sess_destroy();
	  redirect('Login');
	}
}
