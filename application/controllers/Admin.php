<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public	 function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'm');
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function authenticated()
	{ 
		if ($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != '') {
			if (!$this->session->userdata('authenticated')) 
			$this->session->set_flashdata('pesan', 'Silahkan login terlebih dahulu');
			 redirect(base_url());
		}
	}
	public function index()
	{
		if ($this->session->userdata('level') == '') {
			$this->authenticated();
		}else if ($this->session->userdata('level') == '2') {
			redirect('Dashboard');
		}else{
		$data['title'] = "Dashboard";
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$data['read'] = $this->m->Get_All('jadwal','$select');
// 		$this->load->view('template/frontend/navbar', $data);
		$this->load->view('admin/index', $data);
		}
	}
	public function presensi()
	{
		if ($this->session->userdata('level') == '') {
			$this->authenticated();
		}else if ($this->session->userdata('level') == '2') {
			redirect('Dashboard');
		}else{
		$data['title'] = "Presensi";
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');
		$select = $this->db->select('*');
		$select = $this->db->join('jadwal', 'jadwal.id_jadwal = presensi.id_jadwal');
		$data['read'] = $this->m->Get_All('presensi','$select');
		$this->load->view('admin/presensi', $data);
		}
	}
	public function profile()
	{
		if ($this->session->userdata('level') == '') {
			$this->authenticated();
		}else if ($this->session->userdata('level') == '2') {
			redirect('Dashboard');
		}else{
		$data['title'] = "Dashboard";
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');
		$this->load->view('admin/profile',$data);
		}
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
			'nim'    		=>  $this->input->post('nim'),
		    'password' 		=>  $this->input->post('password'),
		    'nama'		  	=>  $this->input->post('nama'),
		    'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),    
		    'level' 		=>  "1",    
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
		$this->session->set_flashdata('pesan', 'Profile berhasil diubah!!');
		$this->m->Update($where, $data, $table);	
		redirect(base_url().'admin/profile');
	}

	
}
