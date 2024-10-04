<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
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
		$data['title'] = "Jadwal";
		$select = $this->db->select('*');
		//$select = $this->db->where('nim', $this->session->userdata('nim'));
		$data['akun'] = $this->m->Get_All('user','$select');

		$select = $this->db->select('*');
		$data['matkul'] = $this->m->Get_All('matkul','$select');

		$select = $this->db->select('*');
		$data['dosen'] = $this->m->Get_All('dosen','$select');

		if(isset($_GET['semester']))
		{
		    $select= $this->db->where('semester =', $_GET['semester']);
		}
		$select = $this->db->select('*');
		$select = $this->db->join('user', 'user.nim = jadwal.nim');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();

		// $select = $this->db->select('*');
		// $select = $this->db->join('user', 'user.nim = jadwal.nim');
		// $select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		// $select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		// $data['read'] = $this->m->Get_All('jadwal','$select');

		$this->load->view('admin/jadwal', $data);
		}
	}
	function add()
  	{
    	$data=array(
    		'nim'    		=>  $this->input->post('nim'),
      		'id_matkul'     =>  $this->input->post('id_matkul'),
      		'id_dosen'	    =>  $this->input->post('id_dosen'),
      		'link_gmeet'    =>  $this->input->post('link_gmeet'),
      		'hari'		    =>  $this->input->post('hari')
    	);
    
    	$this->m->Save($data, 'jadwal');
    	$this->session->set_flashdata('pesan1', 'Data jadwal berhasil ditambahkan!!');
    	redirect(base_url().'Jadwal');
  	}
  	function edit($id_jadwal)
	{
		$data=array(
			'nim'    		=>  $this->input->post('nim'),
      		'id_matkul'     =>  $this->input->post('id_matkul'),
      		'id_dosen'	    =>  $this->input->post('id_dosen'),
      		'link_gmeet'    =>  $this->input->post('link_gmeet'),
      		'hari'		    =>  $this->input->post('hari')
		);

		$table = 'jadwal';
		$where=array(
			'id_jadwal'		=>	$id_jadwal
		);		
		$this->session->set_flashdata('pesan1', 'Data jadwal berhasil diubah!!');
		$this->m->Update($where, $data, $table);	
		redirect(base_url().'Jadwal');
	}
	public function delete($id_jadwal)
	{
		$table = 'jadwal';
		$where=array(
			'id_jadwal'		=>	$id_jadwal
		);
		$read = $this->m->Get_Where($where, $table);
		$this->session->set_flashdata('pesan1', 'Data jadwal berhasil dihapus!!');
		$this->m->Delete($where, $table);
		redirect(base_url().'Jadwal');
	}
}
