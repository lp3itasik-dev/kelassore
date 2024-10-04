<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	Public	 function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user/_guide/general/urls.html
	 */
	public function authenticated()
	{ 
		if ($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != '') {
			if (!$this->session->userdata('authenticated')) 
			$this->session->set_flashdata('pesan', 'Silahkan Login Terlebih Dahulu');
			redirect('Dashboard');
		}
	}
	public function index()
	{
		if ($this->session->userdata('level') == '') {
			$this->authenticated();
		}else if ($this->session->userdata('level') == '2') {
			redirect('Dashboard');
		}else{
		$data['title'] = "User";
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('user','$select');
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');
		$this->load->view('admin/user', $data);
		}
	}
	function add()
  {
    $data=array(
      'nim'    			=>  $this->input->post('nim'),
      'password'  		=>  $this->input->post('password'),
      'nama'	  		=>  $this->input->post('nama'),
      'kelas' 			=>  $this->input->post('kelas'),
      'jurusan'	 		=>  $this->input->post('jurusan'),
      'jenis_kelamin' 	=>  $this->input->post('jenis_kelamin'),
      'level' 			=>  $this->input->post('level'),                  
    );
    if(!empty($_FILES['foto']['name']))
    {
      $path = 'assets/img/user/';
      $upload = $this->_do_upload($path);
      $data['foto'] = $upload;
    }else{
      $data['foto'] = "default.png";
    }
    
    $this->m->Save($data, 'user');
    $this->session->set_flashdata('pesan1', 'Data user berhasil ditambahkan!!');
    redirect(base_url().'User');
  }
  private function _do_upload($path){ 
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500000; //set max size allowed in Kilobyte
        $config['max_width']            = 500000; // set max width image allowed
        $config['max_height']           = 500000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
    }
    return $this->upload->data('file_name');
  }
  function edit()
	{
		$data=array(
		  'nim'    			=>  $this->input->post('nim'),
	      'password'  		=>  $this->input->post('password'),
	      'nama'	  		=>  $this->input->post('nama'),
	      'kelas' 			=>  $this->input->post('kelas'),
	      'jurusan'	 		=>  $this->input->post('jurusan'),
	      'jenis_kelamin' 	=>  $this->input->post('jenis_kelamin'),
	      'level' 			=>  $this->input->post('level'),    
		);

		$table = 'user';
		$where=array(
			'nim'		=>	$this->input->post('nim')
		);

		if(!empty($_FILES['foto']['name']))
		{
			$path = 'assets/img/user/';
			$upload = $this->_do_upload($path);
			$data['foto'] = $upload;

		$read = $this->m->Get_Where($where, $table);
		if(file_exists('assets/img/user/'.$read[0]->foto) && ($read[0]->foto != 'default.jpg'))
			unlink('assets/img/user/'.$read[0]->foto);
		}
		$this->session->set_flashdata('pesan1', 'Data user berhasil diubah!!');
		$this->m->Update($where, $data, $table);	
		redirect(base_url().'User');
	}
	public function delete()
	{
		$table = 'user';
		$where=array(
			'nim'		=>	$_GET['nim']
		);
		$read = $this->m->Get_Where($where, $table);
		if(file_exists('assets/img/user/'.$read[0]->foto) && ($read[0]->foto != 'default.jpg'))
			unlink('assets/img/user/'.$read[0]->foto);
		$this->session->set_flashdata('pesan1', 'Data user berhasil dihapus!!');
		$this->m->Delete($where, $table);
		redirect(base_url().'User');
	}
}
