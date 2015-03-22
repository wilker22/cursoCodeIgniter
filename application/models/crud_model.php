<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{
	
	public function do_insert($dados = NULL){
		if($dados!=NULL){
			$this->db->insert('pessoa', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso!');
			redirect('crud/create');
		}

	}

	public function do_update($dados=NULL, $condicao=NULL){
		if($dados!=NULL && $condicao!=NULL){
			$this->db->update('pessoa', $dados, $condicao);
			$this->session->set_flashdata('edicaook', 'Cadastro efetuado com sucesso!');
			redirect(current_url());
		}

	}

	public function do_delete($condicao=NULL){
		if($condicao!=NULL){
			$this->db->delete('pessoa', $condicao);
			$this->session->set_flashdata('excluirok', 'Excluido  com sucesso!');
			redirect('crud/retrieve');
		}
	}

	public function get_all(){
		return $this->db->get('pessoa');
	}

	public function get_byid($id=NULL){
		if($id !=NULL){
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('pessoa');
		}else{
			return FALSE;
		}
	}


}