<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {
    public function __construct(){
    	parent::__construct();
    	date_default_timezone_set('America/Guayaquil');
    }
    function dataTable($search,$table,$id,$order,$postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     //$columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $id; // Column name
     $columnSortOrder = $order; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery .= "(";
        $cant = count($search);
        $i = 0;
         foreach($search as $s){
            $i++;
            if($i < $cant){
                $searchQuery .= $s." like '%".$searchValue."%' or ";   
            }else{
                $searchQuery .= $s." like '%".$searchValue."%'";  
            }
         }
        $searchQuery .= ")";
        //$searchQuery = " (".$search[0]." like '%".$searchValue."%' or ".$search[1]." like '%".$searchValue."%' or ".$search[2]." like'%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
     $records = $this->db->get($table)->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get($table)->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
     $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get($table)->result();
     
     $res = array(
            "draw"=>$draw,
            "records"=>$records,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            
        );

     return $res; 
   }
    function get2($fields,$table,$orderBy,$orderType,$limit=null){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($limit);
        $this->db->order_by($orderBy,$orderType);
        $query = $this->db->get();
        $result =  $query->result();
        return $result;
    }
    function getFiles($fields,$table,$orderBy,$orderType,$anio,$limit=null){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('anio',$anio);
        $this->db->limit($limit);
        $this->db->order_by($orderBy,$orderType);
        $query = $this->db->get();
        $result =  $query->result();
        return $result;
    }
    function getRes($fields,$table,$orderBy,$orderType,$anio,$res,$limit=null){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('anio',$anio);
        $this->db->where('nombre',$res);
        $this->db->limit($limit);
        $this->db->order_by($orderBy,$orderType);
        $query = $this->db->get();
        $result =  $query->result();
        return $result;
    }
    function getById($id,$fields,$table){
        $this->db->select($fields);
        $this->db->where('id',$id);
        $this->db->limit(1);
        return $this->db->get($table)->row();
    }
    function add($table,$data,$returnId = false){
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1')
		{
            if($returnId == true){
                return $this->db->insert_id($table);
            }
			return TRUE;
		}

		return FALSE;
    }
    function getByRow($row,$rowData,$fields,$table){
        $this->db->select($fields);
        $this->db->where($row,$rowData);
        $this->db->limit(1);
        return $this->db->get($table)->row();
    }
    function busqueda($term){
        $this->db->select('*');
        $this->db->from('noticias');
        $this->db->order_by('fecha','desc');
        $this->db->like('titulo',$term);
        $this->db->or_like('content',$term);
        $query = $this->db->get();
        $result =  $query->result();
        return $result;
    }
    function get($table,$fields,$order_by,$order="ASC",$join_table='',$join_s='',$whereRow = '',$whereData = '',$limit='',$whereRow2 = '',$whereData2 =''){
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($order_by,$order);
        if($join_table !='' and $join_s !=''){
            $this->db->join($join_table,$join_s);
        }
        if($whereRow != '' and $whereData != ''){
            $this->db->where($whereRow,$whereData);
        }
        if($whereRow2 != '' and $whereData2 != ''){
            $this->db->where($whereRow2,$whereData2);
        }
        if($limit != ''){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        $result =  $query->result();
        return $result;
    }
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		return FALSE;
    }
    function del($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
    }
    function make_datatables(){
         $this->make_query();
         if($_POST["length"] != -1)
         {
              $this->db->limit($_POST['length'], $_POST['start']);
         }
         $query = $this->db->get();
         return $query->result();
    }
    function get_filtered_data(){
         $this->make_query();
         $query = $this->db->get();
         return $query->num_rows();
    }
    function get_all_data(){
         $this->db->select("*");
         $this->db->from($this->table);
         return $this->db->count_all_results();
    }
    function genNum($long){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);

        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass = $long;

        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);

            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
      return $pass;
    }
    function file_upload($destino){
        $upload_folder = FCPATH . $destino;
        if (!file_exists($upload_folder)) {
            mkdir($upload_folder, 0777, TRUE);
        }
        $config['upload_path'] = $upload_folder;
        $config['allowed_types'] = 'png|jpg|jpeg|bmp|JPEG||PNG||JPG||pdf||BMP||PDF';
        $config['max_size']     = 9999999999999;
        $config['remove_space'] = true;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            return $this->upload->data();
        }
    }
    public function login($email,$password){
	  $this->db->where('user',$email);
	  $this->db->where('pass',$password);
	  $cuenta = $this->db->get('usuarios')->row();
	  if($cuenta != ''){
	    $this->session->set_userdata('conectado',TRUE);
	    $data = array(
	      'id' => $cuenta->id,
          'nombre' => $cuenta->Nombre_Usuario,
          'user' => $cuenta->user,
          'id_permiso' => $cuenta->permiso
        );
        $this->session->set_userdata($data);
	    return true;
	  }else{
	    return false;
	  }
	}
	public function logout($id){
	  $this->db->where('id',$id);
	  $cuenta = $this->db->get('usuarios')->row();
	  if($cuenta != null){
	    return true;
	  }else{
	    return false;
	  }
	}
}