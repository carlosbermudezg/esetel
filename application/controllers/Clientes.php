<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller { 

	public function index()
	{
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['ClientesActive'] = 'active';
		$this->data['view'] = 'clientes/clientes';
		$this->load->view('main',$this->data);
	}

	function data(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
        $table='clientes';
        
        // POST data
        $postData = $this->input->post();
        //parametros de busqueda
        $search = array(
            'codigo',
            'nombres',
            'apellidos',
            'dni',
            'direccion',
        );
        // Get data
        $id = 'id';
        $order = 'desc';
        $res = $this->General_model->dataTable($search,$table,$id,$order,$postData);
        
        $data = array();

        foreach($res['records'] as $r ){
            if($r->archivado == 0 || $r->archivado == ''){
                $status = 'Activo';
            }else{
                $status = 'Archivado';
            }
            $data[] = array(
               "id"=>$r->codigo,
               "nombres"=>'<a href="'.base_url('clientes/perfil/'.$r->id).'">'.$r->nombres.' '.$r->apellidos.'</a>',
               "fecha"=>$r->fecha_registro,
               "direccion"=>$r->direccion,
               "estado"=>$status,
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
    function addCliente(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
        $this->data['ClientesActive'] = 'active';
		$this->data['view'] = 'clientes/addCliente';
		$this->load->view('main',$this->data);
    }
    function perfil(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
        $id = $this->uri->segment(3);
        $this->data['result'] = $this->General_model->getById($id,'*','clientes');
        $this->data['ClientesActive'] = 'active';
		$this->data['view'] = 'clientes/perfilCliente';
		$this->load->view('main',$this->data);
    }
}
