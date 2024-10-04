<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
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
				$this->session->set_flashdata('pesan', 'Silahkan Login Terlebihdahulu');
			redirect('Dashboard');
		}
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['keterangan'] = 'Tidak Ada Jadwal';

		$this->load->view('dashboard/index', $data);
	}

	public function mhs()
	{
		$data['title'] = 'Dashboard';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('matkul', '$select');
		$this->load->view('dashboard/akun/mhs', $data);
	}

	public function jadwal()
	{
		$data['title'] = 'Jadwal';
		$this->load->view('dashboard/akun/jadwal', $data);
	}

	public function nilai()
	{
		$data['title'] = 'Nilai';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('nilai', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		if (isset($_GET['semester'])) {
			$select = $this->db->where('semester =', $_GET['semester']);
		}
		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = nilai.id_matkul');
		$data['read'] = $this->db->get('nilai')->result();
		$this->load->view('dashboard/akun/nilai', $data);
	}

	public function smt1()
	{
		$data['title'] = 'Semester 1';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 1"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt1', $data);
	}

	public function smt2()
	{
		$data['title'] = 'Semester 2';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 2"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt2', $data);
	}

	public function smt3()
	{
		$data['title'] = 'Semester 3';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 3"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt3', $data);
	}

	public function smt4()
	{
		$data['title'] = 'Semester 4';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 4"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt4', $data);
	}

	public function smt5()
	{
		$data['title'] = 'Semester 5';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 5"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt5', $data);
	}

	public function smt6()
	{
		$data['title'] = 'Semester 6';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 6"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/smt6', $data);
	}

	public function profil()
	{
		$data['title'] = 'Profil';
		$this->load->view('dashboard/akun/profil', $data);
	}

	private function _do_upload($path)
	{
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000; //set max size allowed in Kilobyte
		$config['max_width']            = 500000; // set max width image allowed
		$config['max_height']           = 500000; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) //upload and validate
		{
			$data['inputerror'][] = 'foto';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
	public function edit()
	{
		$data = array(
			'nim'    		=>  $this->input->post('nim'),
			'password'  	=>  $this->input->post('password'),
			'nama'			=>  $this->input->post('nama'),
			'kelas'			=>  $this->input->post('kelas'),
			'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
			'jurusan' 		=>  $this->input->post('jurusan'),
			'level' 		=>  "2"
		);

		$table = 'user';
		$where = array(
			'nim'		=>	$this->input->post('nim')
		);

		if (!empty($_FILES['foto']['name'])) {
			$path = 'assets/img/user/';
			$upload = $this->_do_upload($path);
			$data['foto'] = $upload;

			$read = $this->m->Get_Where($where, $table);
			if (file_exists('assets/img/user/' . $read[0]->foto) && ($read[0]->foto != 'default.jpg'))
				unlink('assets/img/user/' . $read[0]->foto);
		}
		$this->session->set_flashdata('pesan', 'Profile berhasil diubah!!');
		$this->m->Update($where, $data, $table);
		$this->load->view('dashboard/akun/profil', $data);
	}

	public function resetpass()
	{
		$table = 'user';
		$where = array(
			'nim'		=>	$this->input->post('nim')
		);
		//first validate then insert in db
		$data = array(
			'password'    	=>  $this->input->post('password')
		);

		$this->m->Update($where, $data, $table);

		$this->session->set_flashdata('pesan2', 'Password berhasil diubah!!');
		redirect(base_url());
	}

	public function actadd_detail1()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm1');
	}

	public function actadd_detail2()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm2');
	}

	public function actadd_detail3()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm3');
	}

	public function actadd_detail4()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm4');
	}

	public function actadd_detail5()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm5');
	}

	public function actadd_detail6()
	{
		$data = [
			'id_jadwal'     => $this->input->post('id_jadwal'),
			'nim'   		=> $this->input->post('nim'),
			'status'   		=> 'Hadir',
			'semester'   		=> $this->input->post('semester'),
		];

		$this->m->Save($data, 'detail_jadwal');
		redirect('dashboard/gm6');
	}

	// GUGELMIT //
	public function gm1()
	{
		$data['title'] = 'Semester 1';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 1"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm1', $data);
	}

	public function gm2()
	{
		$data['title'] = 'Semester 2';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 2"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm2', $data);
	}

	public function gm3()
	{
		$data['title'] = 'Semester 3';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 3"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm3', $data);
	}

	public function gm4()
	{
		$data['title'] = 'Semester 4';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 4"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm4', $data);
	}

	public function gm5()
	{
		$data['title'] = 'Semester 5';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 5"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm5', $data);
	}

	public function gm6()
	{
		$data['title'] = 'Semester 6';
		$select = $this->db->select('*');
		$data['read'] = $this->m->Get_All('jadwal', $select);
		$select = $this->db->where('nim', $this->session->userdata('nim'));

		$select = $this->db->select('*');
		$select = $this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul');
		$select = $this->db->where('semester = "Semester 6"');
		$select = $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
		$data['read'] = $this->db->get('jadwal')->result();
		$this->load->view('dashboard/akun/gm6', $data);
	}

}
