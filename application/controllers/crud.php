<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller{

public function __construct(){
	parent::__construct();
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->helper('array');
	$this->load->library('session');
	$this->load->model('crud_model', 'crud');
	$this->load->library('table');

//testando
}

public function index(){
		$dados = array(
			'titulo' => 'CRUD com codeigniter',
			'tela' => '', 
			
			);
		$this->load->view('includes/crud', $dados);
	}

public function create(){
	//validacao do form
	$this->form_validation->set_rules('nome', 'NOME', 'trim|required|alphanumeric|max_lenght[50]|ucwords');
	$this->form_validation->set_message('is_unique','Este %s já está cadastrado no  no sistema');
	$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_lenght[50]|strtolower|valid_email|is_unique[pessoa.email]');
	$this->form_validation->set_rules('login', 'LOGIN', 'trim|required|max_lenght[25]|strtolower|is_unique[pessoa.login]');
	$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
	$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
	$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]');


	if($this->form_validation->run()==TRUE){
		$dados = elements(array('nome', 'email', 'login', 'senha'), $this->input->post());
		$dados['senha']=md5($dados['senha']);
		$this->crud->do_insert($dados);
	}
		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create', 
			
			);
		$this->load->view('includes/crud', $dados);
	}

public function retrieve(){
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve', 
			'pessoa' => $this->crud->get_all()->result(),
			
			);
		$this->load->view('includes/crud', $dados);
	}

	public function update(){
	//validacao do form
	$this->form_validation->set_rules('nome', 'NOME', 'trim|required|alphanumeric|max_lenght[50]|ucwords');
	$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
	$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
	$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]');


	if($this->form_validation->run()==TRUE){
		$dados = elements(array('nome', 'senha'), $this->input->post());
		$dados['senha']=md5($dados['senha']);
		$this->crud->do_update($dados, array('id'=>$this->input->post('idusuario')));
	}


		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update', 
			
			);
		$this->load->view('includes/crud', $dados);
	}

	public function delete(){
		
	if($this->input->post('idusuario')>0){
	$this->crud->do_delete(array('id'=>$this->input->post('idusuario')));
	}
		$dados = array(
			'titulo' => 'CRUD &raquo; delete',
			'tela' => 'delete', 
			
			);
		$this->load->view('includes/crud', $dados);
	}



}