<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
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
		$data['title'] = "Dosen";
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');
		$select = $this->db->select('*');
		$select = $this->db->order_by('dosen.dosen', 'asc');
		$data['read'] = $this->m->Get_All('dosen','$select');
		$this->load->view('admin/dosen', $data);
		}
	}
	function add()
  	{
    	$data=array(
      		'dosen'    =>  $this->input->post('dosen'),
    	);
    
    	$this->m->Save($data, 'dosen');
    	$this->session->set_flashdata('pesan1', 'Data dosen berhasil ditambahkan!!');
    	redirect(base_url().'Dosen');
  	}
  	function edit($id_dosen)
	{
		$data=array(
			'dosen'    =>  $this->input->post('dosen'),
		);

		$table = 'dosen';
		$where=array(
			'id_dosen'		=>	$id_dosen
		);		
		$this->session->set_flashdata('pesan1', 'Data dosen berhasil diubah!!');
		$this->m->Update($where, $data, $table);	
		redirect(base_url().'Dosen');
	}
	public function delete($id_dosen)
	{
		$table = 'dosen';
		$where=array(
			'id_dosen'		=>	$id_dosen
		);
		$read = $this->m->Get_Where($where, $table);
		$this->session->set_flashdata('pesan1', 'Data dosen berhasil dihapus!!');
		$this->m->Delete($where, $table);
		redirect(base_url().'Dosen');
	}
}
