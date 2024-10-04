<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
  public function home(){
    if($this->session->userdata('level') == '1'){
      redirect('Admin');
    }if($this->session->userdata('level') == '2'){
      redirect('dashboard/mhs');
    }
  }
}

