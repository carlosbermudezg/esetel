<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{        
        /*if(!$this->permisos->checkPermission($this->session->userdata('id_permiso'),'cPermissao')){
            $this->session->set_flashdata('error','Usted no está autorizado para configurar los permisos en el sistema.');
            redirect(site_url('main'));
          }*/
		if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['UsuariosActive'] = 'active';
		$this->data['configOpen'] = 'open';
		$this->data['configExpand'] = 'true';
		$this->data['view'] = 'usuarios/usuarios';
		$this->load->view('main',$this->data);
	}
	function data(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
        $table='usuarios';
        
        // POST data
        $postData = $this->input->post();
        //parametros de busqueda
        $search = array(
            'id',
            'nombre',
            'user',
            'email',
        );
        // Get data
        $id = 'id';
        $order = 'desc';
        $res = $this->General_model->dataTable($search,$table,$id,$order,$postData);
        
        $data = array();

        foreach($res['records'] as $r ){
			if($r->id_permisos == 1){
                $permiso= 'Administrador';
            }else{
                $permiso = 'Usuario';
            }
            $data[] = array(
               "id"=>$r->id,
               "nombre"=>'<a href="'.base_url('usuarios/perfil/'.$r->id).'">'.$r->nombre.'</a>',
               "usuario"=>$r->user,
               "email"=>$r->email,
               "permiso"=>$permiso,
            );
         }
    
         ## Response
         $response = array(
            "draw" => intval($res['draw']),
            "iTotalRecords" => $res['iTotalRecords'],
            "iTotalDisplayRecords" => $res['iTotalDisplayRecords'],
            "aaData" => $data
         );
    
        echo json_encode($response);
    }
} 