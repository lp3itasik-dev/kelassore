<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

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
	Public	 function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');

    
	}
	public function index()
	{    
    $sekarang = date("Y-m-d");
    $select = $this->db->select('*');
    $select = $this->db->like('waktu_kegiatan', $sekarang);
    $data['read'] = $this->m->Get_All('kegiatan','$select');
		$this->load->view('logs/index', $data);
	}
  public function presensi()
  { 
    $select = $this->db->select('*');
    $select = $this->db->join('kategori', 'kategori.id_kategori = kegiatan.id_kategori');
    $select = $this->db->where('kegiatan.id_kegiatan',$_GET['id']);
    $data['read'] = $this->m->Get_All('kegiatan','$select');
    $this->load->view('presensi/presensi_sign', $data);
  }

	public function cek_login(){
    $nim = $this->input->post('nim'); // Ambil isi dari inputan username pada form login
    $password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->m->get($nim); // Panggil fungsi get yang ada di UserModel.php
    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('pesan', 'username tidak ada');
       // Buat session flashdata
      redirect(base_url()); // Redirect ke halaman login
    }else{
      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'nim'=>$user->nim,  // Buat session username
          'password'=>$user->password,
          'nama'=>$user->nama, // Buat session nama
          'kelas'=>$user->kelas,
          'jurusan'=>$user->jurusan,
          'jenis_kelamin'=>$user->jenis_kelamin,
          'foto'=>$user->foto,
          'level'=>$user->level // Buat session role
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('Pages/home'); // Redirect ke halaman home
      }else {
        $this->session->set_flashdata('pesan', 'Password salah'); // Buat session flashdata
        redirect(base_url()); // Redirect ke halaman login
      }
    }
}
	
	public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect(base_url()); // Redirect ke halaman login
  }
	
}
