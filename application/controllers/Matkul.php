<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
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
		$data['title'] = "Matakuliah";
		$select = $this->db->select('*');
		$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');

		if(isset($_GET['semester']))
		{
		    $select= $this->db->where('semester =', $_GET['semester']);
		}
		$select = $this->db->select('*');
		$select = $this->db->order_by('matkul.semester', 'asc');
		$data['read'] = $this->db->get('matkul')->result();
		$this->load->view('admin/matkul', $data);
		}
	}
	function add()
  	{
    	$data=array(
      		'matkul'    =>  $this->input->post('matkul'),
      		'semester'  =>  $this->input->post('semester'),
			'sks'	    =>  $this->input->post('sks')
    	);
    
    	$this->m->Save($data, 'matkul');
    	$this->session->set_flashdata('pesan1', 'Data matakuliah berhasil ditambahkan!!');
    	redirect(base_url().'matkul');
  	}
  	function edit($id_matkul)
	{
		$data=array(
			'matkul'    =>  $this->input->post('matkul'),
			'semester'  =>  $this->input->post('semester'),
			'sks'	    =>  $this->input->post('sks')
		);

		$table = 'matkul';
		$where=array(
			'id_matkul'		=>	$id_matkul
		);		
		$this->session->set_flashdata('pesan1', 'Data matakuliah berhasil diubah!!');
		$this->m->Update($where, $data, $table);	
		redirect(base_url().'matkul');
	}
	public function delete($id_matkul)
	{
		$table = 'matkul';
		$where=array(
			'id_matkul'		=>	$id_matkul
		);
		$read = $this->m->Get_Where($where, $table);
		$this->session->set_flashdata('pesan1', 'Data matakuliah berhasil dihapus!!');
		$this->m->Delete($where, $table);
		redirect(base_url().'matkul');
	}
}
