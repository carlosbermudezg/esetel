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
	function data(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
        $table='permisos';
        
        // POST data
        $postData = $this->input->post();
        //parametros de busqueda
        $search = array(
            'id',
            'nombre',
        );
        // Get data
        $id = 'id';
        $order = 'desc';
        $res = $this->General_model->dataTable($search,$table,$id,$order,$postData);
        
        $data = array();

        foreach($res['records'] as $r ){
            $data[] = array(
               "id"=>$r->id,
               "nombre"=>'<a href="'.base_url('permisos/editar/'.$r->id).'">'.$r->nombre.'</a>',
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
    function addPermisoView(){
        if((!$this->session->userdata('conectado'))){
			redirect('login');
		}
		$this->data['PermisosActive'] = 'active';
		$this->data['configOpen'] = 'open';
		$this->data['configExpand'] = 'true';
		$this->data['view'] = 'permisos/addPermisos';
		$this->load->view('main',$this->data);
    }
    function addPermiso(){
        $nomePermissao = $this->input->post('nombre');
        $cadastro = date('Y-m-d');
        $situacao = 1;

        $permissoes = array(

                'aCliente' => $this->input->post('aCliente'),
                'eCliente' => $this->input->post('eCliente'),
                'dCliente' => $this->input->post('dCliente'),
                'vCliente' => $this->input->post('vCliente'),

                'aAparatos' => $this->input->post('aAparatos'),
                'eAparatos' => $this->input->post('eAparatos'),
                'dAparatos' => $this->input->post('dAparatos'),
                'vAparatos' => $this->input->post('vAparatos'),

                'aProduto' => $this->input->post('aProduto'),
                'eProduto' => $this->input->post('eProduto'),
                'dProduto' => $this->input->post('dProduto'),
                'vProduto' => $this->input->post('vProduto'),

                'aServico' => $this->input->post('aServico'),
                'eServico' => $this->input->post('eServico'),
                'dServico' => $this->input->post('dServico'),
                'vServico' => $this->input->post('vServico'),

                'aOs' => $this->input->post('aOs'),
                'eOs' => $this->input->post('eOs'),
                'dOs' => $this->input->post('dOs'),
                'vOs' => $this->input->post('vOs'),
                'pSOs' => $this->input->post('pSOs'),
                'pDOs' => $this->input->post('pDOs'),
                'pMOs' => $this->input->post('pMOs'),
                'pCOs' => $this->input->post('pCOs'),
                'aOsP' => $this->input->post('aOsP'),
                'dOsP' => $this->input->post('dOsP'),
                'vOsP' => $this->input->post('vOsP'),
                'aOsS' => $this->input->post('aOsS'),
                'dOsS' => $this->input->post('dOsS'),
                'vOsS' => $this->input->post('vOsS'),
                'hOs' => $this->input->post('hOs'),

                'aVenda' => $this->input->post('aVenda'),
                'eVenda' => $this->input->post('eVenda'),
                'dVenda' => $this->input->post('dVenda'),
                'vVenda' => $this->input->post('vVenda'),

                'aArquivo' => $this->input->post('aArquivo'),
                'eArquivo' => $this->input->post('eArquivo'),
                'dArquivo' => $this->input->post('dArquivo'),
                'vArquivo' => $this->input->post('vArquivo'),

                'aLancamento' => $this->input->post('aLancamento'),
                'eLancamento' => $this->input->post('eLancamento'),
                'dLancamento' => $this->input->post('dLancamento'),
                'vLancamento' => $this->input->post('vLancamento'),

                'aMensajes' => $this->input->post('aMensajes'),
                'eMensajes' => $this->input->post('eMensajes'),
                'dMensajes' => $this->input->post('dMensajes'),
                'vMensajes' => $this->input->post('vMensajes'),

                'rCliente' => $this->input->post('rCliente'),
                'rProduto' => $this->input->post('rProduto'),
                'rServico' => $this->input->post('rServico'),
                'rOs' => $this->input->post('rOs'),
                'rVenda' => $this->input->post('rVenda'),
                'rFinanceiro' => $this->input->post('rFinanceiro'),
                'rtecnico' => $this->input->post('rtecnico'),

                'cCalendario' => $this->input->post('cCalendario'),

                'vpce' => $this->input->post('vpce'),
                'vpcos' => $this->input->post('vpcos'),
                'vpcv' => $this->input->post('vpcv'),
                'vpcp' => $this->input->post('vpcp'),
                'epcdc' => $this->input->post('epcdc'),
                'spcos' => $this->input->post('spcos'),

                'cUsuario' => $this->input->post('cUsuario'),
                'cEmitente' => $this->input->post('cEmitente'),
                'cPermissao' => $this->input->post('cPermissao'),

                'a1' => $this->input->post('a1'),
                'a2' => $this->input->post('a2'),
                'a3' => $this->input->post('a3'),
                'a4' => $this->input->post('a4'),
                'a5' => $this->input->post('a5'),
                'a6' => $this->input->post('a6'),
                'a7' => $this->input->post('a7'),
                'a8' => $this->input->post('a8'),
                'a9' => $this->input->post('a9'),
                'a10' => $this->input->post('a10'),
                'a11' => $this->input->post('a11'),
                'a12' => $this->input->post('a12'),
                'a13' => $this->input->post('a13'),
                'a14' => $this->input->post('a14'),
                'a15' => $this->input->post('a15'),
                'a16' => $this->input->post('a16'),
                'a17' => $this->input->post('a17'),
                'a18' => $this->input->post('a18'),
                

        );
        $permissoes = serialize($permissoes);

        $data = array(
            'nombre' => $nomePermissao,
            'fecha' => $cadastro,
            'permisos' => $permissoes,
            'estado' => $situacao
        );

        if ($this->Permisos_model->add('permisos', $data) == TRUE) {

            $this->session->set_flashdata('success', 'Permiso añadido con éxito.');
            redirect(site_url('permisos'));
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error.</p></div>';
        }
    }
}