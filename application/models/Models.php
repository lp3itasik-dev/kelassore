<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model{	
	public function view($table){
        return $this->db->get($table);
    }
	Public function Get_All($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	function Save($data, $table){
		$result=$this->db->insert($table, $data);
		return $result;
	}
	function Update($where, $data, $table){
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table){
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table){
		$result=$this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table){
		$result=$this->db->delete($table);
		return $result;
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	Public function Get_Rows($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	public function get($nim){
        $this->db->where('nim', $nim); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('user')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }

}